<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>css/jquery.auto-complete.css" />
<script src="<?php echo $siteurl;?>js/jquery.auto-complete.js"></script>
    
    <script>
        $(function(){
                      
		   $('#search').autoComplete({
                minChars: 1,
                source: function(term, suggest){
					//Assign ID to div autocomplete-suggestions
					var abcElements = document.querySelectorAll('#autocomplete-suggestions');
					for (var i = 1; i < abcElements.length; i++)
					abcElements[i].id = 'autocomplete-suggestions-' + i;
					
                    term = term.toLowerCase();
                    var choices = [<?php foreach($search_array as $v){echo "'".$v."'".",";}?>];
                    var suggestions = [];
                    for (i=0;i<choices.length;i++)
                        if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                    suggest(suggestions);
					
					var myElem = document.getElementById('autocomplete-suggestions').style.display;
					
					var url = window.location.href;
					var n = url.search("pagination");
					
					if (window.matchMedia("(max-width: 640px)").matches) {
						/*alert("in 640");*/
					  /* the viewport is at least 400 pixels wide */
					  if (myElem == "block")
					{
					  if(n != -1)
						{
							/*alert("in n not eualt to -1");*/
							document.getElementById('autocomplete-suggestions').style.top = "183px";
						}
						else
						{
						document.getElementById('autocomplete-suggestions').style.top = "233px";
						}
					}
					} else {
					  /* the viewport is less than 400 pixels wide */
					  if (myElem == "block")
					{
						if(n != -1)
						{
							document.getElementById('autocomplete-suggestions').style.top = "-14px";
						}
						else
						{
						document.getElementById('autocomplete-suggestions').style.top = "38px";
						}
					}
					
					}
    				
					/*if (myElem == "block")
					{
						if(n != -1)
						{
							document.getElementById('autocomplete-suggestions').style.top = "-14px";
						}
						else
						{
						document.getElementById('autocomplete-suggestions').style.top = "38px";
						}
					}*/
					
					
                }
            });
			$('#search1').autoComplete({
                minChars: 1,
                source: function(term, suggest){
					//Assign ID to div autocomplete-suggestions
					var abcElements = document.querySelectorAll('#autocomplete-suggestions');
					for (var i = 1; i < abcElements.length; i++)
					abcElements[i].id = 'autocomplete-suggestions-' + i;
			
                    term = term.toLowerCase();
                    var choices = [<?php foreach($search_array as $v){echo "'".$v."'".",";}?>];
                    var suggestions = [];
                    for (i=0;i<choices.length;i++)
                        if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                    suggest(suggestions);
					
					var myElem1 = document.getElementById('autocomplete-suggestions-1').style.display;
					
					if (myElem1 == "block")
					{
						document.getElementById('autocomplete-suggestions-1').style.top = "110px";
					}
                }
            });
        });
</script>


