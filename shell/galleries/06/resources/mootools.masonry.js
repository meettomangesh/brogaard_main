/*************************************************
**  MooTools Masonry version 1.0.0
** 
**  Based on original JQuery Masonry version 1.0.1:
**  copyright David DeSandro, licensed GPL & MIT
**  http://desandro.com/resources/jquery-masonry
**
**  Converted to MooTools by Timothy Armes
**  http://www.timothyarmes.com
**
**  Extra features added:
**
**     Centering of the wall
**     Collapsing of borders
**     Spanning width brick
**     Minimum number of columns
**     Margin
**
**  Usage:
**
**  var wall = new Masonry($('wall'), {
**            columnWidth: 100, 
**            itemSelector: '.box'
**         });
**
**  or, if all items have the same width:
**
**  var wall = new Masonry($('wall'), {
**            singleMode: true, 
**            itemSelector: '.box'
**         });
**
**  To add more items:
** 
**  wall.appendContent(moreContent); // moreContent is a DIV with sub items
**
**************************************************/

var Masonry = new Class({
   
   Implements: Options,
   
   options: {
      singleMode: false,
      columnWidth: undefined,
      itemSelector: undefined,
      resizeable: true,
      callback: undefined,
      keepCentred: true,
      collapseBorders: true,
      span: undefined,
      minColumns: 1,
      margin: 0
   },
  
   initialize: function(wall, options) {
      
      this.setOptions(options);

      this.wall = wall;
      
      // During init the parent of the bricks to be positionned is the wall itself.
      // This container will be different when appending bricks.
      this.brickParent = wall;
      
      if (this.brickParent.getChildren().length > 0  ) {
         
         // Masonry layout
         this.masonrySetup();
         this.masonryArrange(false, false);
         
         // Bind window resizing
         if (this.options.resizeable)
         {
            var instance = this;
            window.addEvent('resize', function() {
               instance.masonryResize(); });
         }
      }      
   },
      
   // Default values on the prototype
      
   colW: undefined,
   colCount: undefined,
   prevColCount: undefined,
   colY: undefined,
   wallH: undefined,
   posTop: 0,
   posLeft: 0,
   bricks: undefined,
   brickParent: undefined,
   appendedContent: undefined,
   
   // Utility functions
   
   getTotalWidth: function(element) {
         
         var width;
         
         if (element == this.options.span)
         {
            width = this.colW * this.colCount - parseInt(element.getStyle('padding-left')) - parseInt(element.getStyle('padding-right'))  ;
            if (this.options.collapseBorders) width = width - parseInt(element.getStyle('border-right'))
            element.setStyle('width', width);
         }
         else
         {
            width = element.getSize().x + parseInt(element.getStyle('margin-left')) + parseInt(element.getStyle('margin-right'));
            if (this.options.collapseBorders) width = width - parseInt(element.getStyle('border-right'))
         }
         
         return width;
   },
   
   getTotalHeight: function(element) {
         var height = element.getSize().y + parseInt(element.getStyle('margin-top')) + parseInt(element.getStyle('margin-bottom'));
         if (this.options.collapseBorders) height = height - parseInt(element.getStyle('border-bottom'))
         return height;
   },

   // Setup
   //
   // Stores the (new) bricks to position.  Calculates the number of columns.

   masonrySetup: function() {
      
      // Store the bricks that we're working with
      this.bricks = this.options.itemSelector == undefined ?
         this.brickParent.getElements() :
         this.brickParent.getElements(this.options.itemSelector);
      
      // If no column width is given use the width of the first brick
      if (this.options.columnWidth == undefined)
      {
         this.colW = this.getTotalWidth(this.bricks[0]);
      }
      else
         this.colW = this.options.columnWidth;
   
      // Work out number of columns
      this.prevColCount = this.colCount;
      this.colCount = Math.floor((this.wall.getSize().x - this.options.margin * 2) / this.colW) ;
      this.colCount = Math.max(this.colCount, 1, this.options.minColumns);
   },
   
   // Function to arrange all the bricks
   
   masonryArrange: function(resizing, appending) {
      
      if (!resizing)
      {
         this.wall.setStyle('position', 'relative');            
         this.bricks.each(function(brick) { brick.setStyle( 'position', 'absolute' ); });
      }
       
      // Get top left position of where the bricks should be
      var cursor = new Element('div');
      cursor.inject(this.brickParent, 'top');
      var position = cursor.getPosition(this.wall);
      this.posLeft = Math.round(position.x + this.options.margin);
      this.posTop =  Math.round(position.y + this.options.margin);
      cursor.dispose();
      
      // If we're centering the bricks (ish) then calculate LHS offset
      if (this.options.keepCentred)
      {
         var remaindingSpace = this.wall.getSize().x - this.colCount * this.colW;
         if (remaindingSpace > 0)
            this.posLeft = remaindingSpace / 2;
      }
         
      // Set up column Y array.  This stores the heights of each column as we work through
      // the bricks.

      if (appending) {
          
          // We use the current value of the this.colY array.
          
          // In the case that the wall is not resizeable,
          // but the colCount has changed from the previous time
          // masonry has been called, restart new columns from the top

          for (i = this.prevColCount; i < this.colCount; i++) {
              this.colY[i] = this.posTop;
          };
      }
      else
      {
         this.colY = [];
         for (i = 0; i < this.colCount; i++)
            this.colY[i] = this.posTop;
      }
      
      // Layout logic
      if ( this.options.singleMode ) {
         this.bricks.each(function(brick, index) {
            this.placeBrick(brick, this.colCount, this.colY, 1);
         }, this);            
      }
      else
      {
         this.bricks.each(function(brick, index) {
      
            // How many columns does this brick span
            var colSpan = Math.ceil(this.getTotalWidth(brick)  / this.colW);
            colSpan = Math.min(colSpan, this.colCount);
         
            if ( colSpan == 1 ) {
               // If brick spans only one column, just like singleMode
               this.placeBrick(brick, this.colCount, this.colY, 1);
            }
            else
            {
               // Brick spans more than one column
         
               // Calculate how many different places could this brick fit horizontally
               var groupCount = this.colCount + 1 - colSpan; 
            
               // For each group's potential horizontal position, store the vertical position
               var groupY = [0];
               for (i = 0; i < groupCount; i++ )
               {
                  groupY[i] = 0;
                  
                  // For each column in that group
                  for (j = 0; j < colSpan; j++ )
                  {
                     // Get the maximum column height in that group
                     groupY[i] = Math.max(groupY[i], this.colY[i + j] );
                  }
               }
         
               this.placeBrick(brick, groupCount, groupY, colSpan);
            }
         }, this);
      }
      
      // Set the height of the wall to the tallest column
      this.wallH = 0;
      for (i = 0; i < this.colCount; i++ )
         this.wallH = Math.max( this.wallH, this.colY[i] );

      this.wall.setStyle('height', this.wallH - this.posTop);
      
      // Provide bricks as context for the callback
      if (this.options.callback) this.options.callback.call( this.bricks );   
   
   },
   
   // Function to place a brick in the wall
   
   placeBrick: function(brick, setCount, setY, setSpan) {

      var shortCol = 0;
      
      // Find shortest column
      for (i = 0; i < setCount; i++ )
         if ( setY[i] < setY[ shortCol ] ) shortCol = i;

      // Position the brick
      brick.setStyles( {
         top: setY[shortCol],
         left: this.colW * shortCol + this.posLeft
      });
      
      // Update the column heights
      for (i = 0; i < setSpan; i++ )
      {
         this.colY[shortCol + i] = setY[shortCol] + this.getTotalHeight(brick) ;
      }
   },
   
   // Called when the wall is resized
   
   masonryResize: function() {
      this.brickParent = this.wall;      
      this.masonrySetup();
      if (this.colCount != this.prevColCount || this.options.keepCentred) this.masonryArrange(true, false);
   },
   
   // Called by the user to add new bricks to the wall
   
   appendContent: function(content) {
      this.brickParent = content;
      content.getChildren().each(function(brick) { brick.setStyle( 'position', 'absolute' ); });
      content.inject(this.wall, 'bottom');
      this.masonrySetup();
      this.masonryArrange(false, true);
   },
   
   // Called by the user to add a callback function that'll be called with the new block added
   
   setCallback: function(callback) {
      
      this.options.callback = callback
   }
   
});