<!DOCTYPE html>
<html lang="en">
  <head>
	<?php 
		# Here's the variable for all the json/sql/whatever arrays. It's all built with this list
		$params = array('EngineName','2Dsupport', '3Dsupport', 'Windows', 'Linux', 'OSX', 'iOS', 'Android', 'Console', 'NextGenConsole', 'Cost', 'Forums', 'Updates', 'OpenSource', 'Commercial', 'Tutorials', 'Documentation', 'C', 'Java', 'HTML5', 'Python');
		$params2 = array('EngineName', 'Forums', 'Documentation', 'Tutorials', 'TimeToLearn', 'Prerequisites', 'LowEndBuild', 'DevelopmentWeight', 'BuildWeight', 'PlatformsBuiltTo', 'PlatformQuality', 'SwitchingPlatforms', 'PlatformDevelopment', 'CustomGUI', 'ChangeSource', 'Plugins', 'PurchasePrice', 'Subscription', 'Assets', 'DevelopmentExpense', '2Dsupport', '3Dsupport', 'Windows', 'Linux', 'OSX', 'iOS', 'Android', 'Console', 'NextGenConsole', 'C', 'Java', 'HTML5', 'Python', 'OpenSource', 'Commercial');
	?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" media="screen" href="js/silviomoreto-bootstrap/bootstrap-select.min.css" rel="stylesheet">
	<link rel="icon" href="favicon.ico" />
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1 style="text-align:center">Game Engine Score Chart</h1>
	<br />
	<div id="engines" style="width: 80%;margin: auto">
		<div class="input-group col-lg-3">
			<span class="input-group-addon">Filter Engines by Name</span>
			<input id="name-search" type="text" size="20" class="form-control" placeholder="Search" />
		</div>
		<br />
		<div class="input-group col-lg-3">
			<span class="input-group-addon">Select Columns To Show</span>
			<select id="toggleDropdown" class="selectpicker" show-tick multiple data-size="10" data-selected-text-format="count>3">
		<!--<label for="toggleDropdown">Select Columns to Show</label>
		<select id="toggleDropdown" class="selectpicker" show-tick multiple data-size="10" data-selected-text-format="count>3">-->
			<?php
			#$params2 = array('EngineName','2Dsupport', '3Dsupport', 'Windows', 'Linux', 'OSX', 'iOS', 'Android', 'Console', 'NextGenConsole', 'Cost', 'Forums', 'Updates', 'OpenSource', 'Commercial', 'Tutorials', 'Documentation', 'C', 'Java', 'HTML5', 'Python');
			foreach($params2 as $val)
			{
				echo "<option id=\"toggleDropdown$val\">$val</option>";
			}
		?>
		</select></div>
		<div class="btn-group">
			<button type="button" class="btn btn-default btn-success" onClick="selectAll()">Select All</button>
			<button type="button" class="btn btn-default btn-danger" onClick="selectNone()">Select None</button>
		</div>
		<br /><br />
		<label for="weightDropdown">Set Column Weight</label>
		<select id="weightDropdown" class="selectpicker" data-size="10">
			<?php
			#$params2 = array('EngineName','2Dsupport', '3Dsupport', 'Windows', 'Linux', 'OSX', 'iOS', 'Android', 'Console', 'NextGenConsole', 'Cost', 'Forums', 'Updates', 'OpenSource', 'Commercial', 'Tutorials', 'Documentation', 'C', 'Java', 'HTML5', 'Python');
			$tmp = 0;
			foreach($params2 as $val)
			{
				if($tmp == 0)
					$tmp++;
				else
					echo "<option id=\"weightDropdown$val\">$val</option>";
			}
		?>
		</select>
		<div class="form-group col-lg-1"><input size="2" type="number" class="form-control" id="colWeight" placeholder="0-10" min="0" max="10" required></div>
		<div class="btn-group" style="vertical-align: top">
			<button type="button" class="btn btn-btn-default btn-success" onClick="selectAllWeights()">Select All</button>
			<button type="button" class="btn btn-default btn-danger" onClick="selectNoWeights()">Select None</button>
			<button type="button" class="btn btn-default btn-primary" onClick="selectWeightsByView()">Select Visible</button>
			<button type="button" class="btn btn-default btn-info" onClick="refreshWeights()">Refresh Weights</button>
		</div>
		<br />
		
		
		<ol id="scoreList" class="list-group"></ol>
		<div class="table-responsive" style="overflow-x: auto"><table id="jsonTable" class="table table-striped table-hover"><tbody class="list"></tbody></table></div>
	</div>
	<br />
	<h1 style="text-align:center">Evaluate an Engine</h1>
	<br />
	<div style="width:80%; margin: auto; margin-bottom: 100px">
	<div style="width: 40%;margin-left: 0; display:inline-block">
	<form role="form" style="overflow-y: auto; height: 600px">
		<div class="form-group">
			<label for="EngineName">Engine Name</label>
			<select id="EngineName" class="form-control" required>
				<option value="" disabled>Pick and Engine</option>
				<option value="Unity">Unity</option>
				<option value="SDL2">SDL2</option>
				<option value="Pygame">Pygame</option>
				<option value="AGK">AGK</option>
				<option value="Blender">Blender</option>
				<option value="Godot">Godot</option>
			</select>
		</div>
		<?php
			#$params2 = array('2Dsupport', '3Dsupport', 'Windows', 'Linux', 'OSX', 'iOS', 'Android', 'Console', 'NextGenConsole', 'Cost', 'Forums', 'Updates', 'OpenSource', 'Commercial', 'Tutorials', 'Documentation', 'C', 'Java', 'HTML5', 'Python');
			$tmp = 0;
			foreach($params2 as $val)
			{
				if($tmp == 0)
					$tmp++;
				else
					echo "<div class=\"form-group\"><label for=\"$val\">$val</label><input size=\"2\" type=\"number\" class=\"form-control\" id=\"$val\" placeholder=\"0-10\" min=\"0\" max=\"10\" onfocus=\"togglePrompt(this.id)\" required></div>";
			}
		?>
		<button type="button" class="btn btn-default form-control" onclick="postJSON()">Submit</button>
	</form>
	</div>
	<div style="width: 50%; display:inline-block;vertical-align: top;overflow-y: auto; height: 600px">
	<?php include("prompts.php"); ?>
	</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<!-- Bootstrap plugin for multiselect lists -->
	<script src="js/silviomoreto-bootstrap/bootstrap-select.min.js"></script>
	<!-- For sorting and such -->
	<script src="http://listjs.com/no-cdn/list.js"></script>
	<script type="text/javascript">
		$(document).ready(function(e) {
              $('.selectpicker').selectpicker();
			  $('#colWeight').val(10);
			  getMySQL();
			  for(var i = 1; i < options['valueNames'].length; i++)
			  {
				//console.log("#Prompt"+options['valueNames'][i]);
				$("#Prompt"+options['valueNames'][i]).hide();
			  }
          });
		  
		  // Post grades to server using PHP
		function postJSON()
		{
			var jsonData = jQuery.parseJSON('{"EngineName":"'+document.getElementById("EngineName").value+'"<?php foreach($params2 as $val) {if($val != "EngineName") {echo ",\"$val\":'+document.getElementById(\"$val\").value+'";}} ?>}');
			jQuery.post("JSONwriter.php", {json: JSON.stringify(jsonData)}, function(data){alert("Success!"); });
			getMySQL();
			return true;
		}
		
		/*options = {
			"valueNames": [ "EngineName", "2Dsupport", "3Dsupport", "Windows", "Linux", "OSX", "iOS", "Android", "Console", "NextGenConsole", "Cost", "Forums", "Updates", "OpenSource", "Commercial", "Tutorials", "Documentation", "C", "Java", "HTML5", "Python" ]
		};*/
		
		var options = {
			"valueNames": [ 
			<?php $tmp = 0; 
			foreach($params2 as $val) 
			{ 
				if($tmp == 0) {$tmp++; echo "\"$val\"";} 
				else {echo ", \"$val\"";}
			} ?> ]
		};
		
		/*weights = {
			"weights": [ "2Dsupport":"10", "3Dsupport":"10", "Windows":"10", "Linux":"10", "OSX":"10", "iOS":"10", "Android":"10", "Console":"10", "NextGenConsole":"10", "Cost":"10", "Forums":"10", "Updates":"10", "OpenSource":"10", "Commercial":"10", "Tutorials":"10", "Documentation":"10", "C":"10", "Java":"10", "HTML5":"10", "Python":"10" ]
		};*/
		
		var weights = {
			<?php $tmp = 0;
			foreach($params2 as $val) 
			{
				if($tmp == 0) {$tmp++;}
				else if($tmp == 1) {$tmp++; echo "\"$val\":10";}
				else {echo ", \"$val\":10";}
			}?>
		};
		
		var engineList = new List('engines', options);
		
		var tableSort = document.getElementById("jsonTable");
		
		$('#name-search').keyup(function() {
			var searchString = $(this).val().toLowerCase();
			for(var i = 1, row; row = tableSort.rows[i]; i++)
			{
				//console.log(row.cells[2].innerText);
				if(row.cells[1].innerText.toLowerCase().indexOf(searchString) > -1)
				{
					row.style.display = "";
				}
				else
				{
					row.style.display = "none";
				}
			}
		});
		
		$('#toggleDropdown').on('change', function() {
			var last = -1;
			var found = false;
			if($('#toggleDropdown.selectpicker option:selected').length)
			{
				//console.log("LENGTH:: "+$('#toggleDropdown.selectpicker option:selected').length);
				$('#toggleDropdown.selectpicker option:selected').each(function(index) {
					//console.log(tableSort.rows[0].cells.length);
					for(var i = last+1, found = false; i < tableSort.rows[0].cells.length; i++)
					{
						//console.log($(this).val()+"=="+tableSort.rows[0].cells[i].innerHTML);
						if(!found && $(this).val() == tableSort.rows[0].cells[i].innerHTML)
						{
							for(var j = 0; j < tableSort.rows.length; j++)
							{
								tableSort.rows[j].cells[i].style.display = "";
								//console.log("HIT::"+tableSort.rows[j].cells[i].innerHTML);
							}
							last = i;
							found = true;
						}
						else
							for(var j = 0; j < tableSort.rows.length; j++)
							{
								//console.log("MISS::"+tableSort.rows[j].cells[i].innerHTML);
								tableSort.rows[j].cells[i].style.display = "none";
							}
					}
					//console.log("END OF $.EACH #############");
				});
			}
		});
		
		function getMySQL()
		{
			//console.log("getMySQL()");
			$.get("display.php", function(data) {
				realJSON = $.parseJSON(data);
			}).then(function() {
			
				var tbl_body = "<tbody class=\"list\">";
				var tbl_head;
				var dropdown_body;
				var i = 0;
				$.each(realJSON, function() {
					tbl_head = "<thead><tr><th class=\"sort\" data-sort=\"ID\" style=\"display:none\">ID</th>";
					dropdown_body = "";
					//dropdown_body = "<option selected disabled style=\"display:none\">Sort By:</option>";
					var tbl_row = "<td class=\"id\" style=\"display:none;\">"+i+"</td>";
					i++;
					$.each(this, function(k , v) {
						if(k=='ID'){/*do nothing*/}
						else
						{
							tbl_row += "<td class=\""+k+"\">"+v+"</td>";
							tbl_head += "<th class=\"sort\" data-sort=\""+k+"\">"+k+"</th>";
							dropdown_body += "<option value="+k+">"+k+"</option>";
						}
					})
					tbl_head += "</tr></thead>";
					tbl_body += "<tr>"+tbl_row+"</tr>";                 
				})
				tbl_body = tbl_head + tbl_body + "</tbody>";
				$("table").html(tbl_body);
				$("#toggleDropdown").html(dropdown_body);
				
			});
			$('.selectpicker').selectpicker('render');
		}
		
		function selectAll()
		{
			$('.selectpicker').selectpicker('selectAll');
			$('.selectpicker').selectpicker('render');
		}
		
		function selectNone()
		{
			$('.selectpicker').selectpicker('deselectAll');
			$('.selectpicker').selectpicker('val', 'EngineName');
			$('.selectpicker').selectpicker('render');
		}
		
		function selectAllWeights()
		{
			for(var i = 1; i < options['valueNames'].length; i++)
			{
				//console.log(weights[options['valueNames'][i]]);
				weights[options['valueNames'][i]] = 10;
			}
			$('#colWeight').val(10);
		}
		
		function selectNoWeights()
		{
			for(var i = 1; i < options['valueNames'].length; i++)
			{
				//console.log(weights[options['valueNames'][i]]);
				weights[options['valueNames'][i]] = 0;
			}
			$('#colWeight').val(0);
		}
		
		function selectWeightsByView()
		{
			if($('#toggleDropdown.selectpicker option:selected').length == 0) {/*do nothing*/}
			else
			{
				selectNoWeights();
				$('#toggleDropdown.selectpicker option:selected').each(function(index) {
					if($(this).val() != "EngineName")
						weights[$(this).val()] = 10;
				});
			}
		}
		
		$('#weightDropdown').on('change', function() {
			$("#colWeight").val(weights[$("#weightDropdown").val()]);
			//console.log($("#weightDropdown").val()+", "+weights[$("#weightDropdown").val()]);
		});
		
		$('#colWeight').on('change', function() {
			weights[$("#weightDropdown").val()] = $(this).val();
			//console.log($("#weightDropdown").val()+", "+weights[$("#weightDropdown").val()]);
		});
		
		function togglePrompt(id)
		{
			for(var i = 1; i < options['valueNames'].length; i++)
			  {
				//console.log("#Prompt"+options['valueNames'][i]);
				$("#Prompt"+options['valueNames'][i]).hide();
			  }
			$("#Prompt"+id).show();
		}
		
		var scoreList;
		var nameArray = [];
		var scoreArray = [];
		function refreshWeights()
		{
			//console.log(options['valueNames'][1]);
			//console.log(weights[options['valueNames'][1]]);
			var total = 0;
			var name = "";
			var fullString = "";
			for(var i = 1, row; row = tableSort.rows[i]; i++) // for each row in jsonTable
			{
				scoreArray[i-1] = 0;
				for(var j = 1, col; col = row.cells[j]; j++) // for each column in jsonTable
				{
					if(j==1)
						nameArray[i-1] = col.innerHTML;
					else //if(weights[options['valueNames'][j]] != 10)
					{
						scoreArray[i-1] = scoreArray[i-1] + (weights[options['valueNames'][j-1]] * col.innerHTML / 10);
						//console.log("Total at "+options['valueNames'][j-1]+" is "+total);
					}
				}
				fullString += nameArray[i-1]+": "+scoreArray[i-1]+"\n";
			}
			//alert(fullString);
			fullString = "";
			sortScores();
			if(nameArray.length < 6)
				for(var q = 0; q < nameArray.length; q++)
					fullString += "<li class=\"list-group-item\">"+nameArray[q]+": "+scoreArray[q]+"</li>";
			else
				for(var q = 0; q < 5; q++)
					fullString += "<li class=\"list-group-item\">"+nameArray[q]+": "+scoreArray[q]+"</li>";
			$("#scoreList").html(fullString);
		}
		
		function sortScores()
		{
			var tempScore = [];
			var tempName = [];
			var lastIT = -1;
			for(var j = 0; j < scoreArray.length; j++)
			{
				tempScore[j] = -1;
				for(var i = 0; i < scoreArray.length; i++)
				{
					//console.log(scores[i]+" > "+tempScore[j]);
					if(scoreArray[i] > tempScore[j])
					{
						lastIT = i;
						tempScore[j] = scoreArray[i];
					}
				}
				tempName[j] = nameArray[lastIT];
				scoreArray[lastIT] = -2;
			}
			for(var j = 0; j < scoreArray.length; j++)
			{
				nameArray[j] = tempName[j];
				scoreArray[j] = tempScore[j];
				//console.log(nameArray[j]+": "+scoreArray[j]);
			}
		}
		
	</script>
  </body>
</html>
