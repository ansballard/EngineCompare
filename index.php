<!DOCTYPE html>
<html lang="en">
	<head>
		<?php 
			# Here's the variable for all the json/sql/whatever arrays. It's all built with this list
			# Change to be read from the database!
			$params2 = array('EngineName', 'Forums', 'Documentation', 'Tutorials', 'TimeToLearn', 'Prerequisites', 'LowEndBuild', 'DevelopmentWeight', 'BuildWeight', 'PlatformsBuiltTo', 'PlatformQuality', 'SwitchingPlatforms', 'PlatformDevelopment', 'CustomGUI', 'ChangeSource', 'Plugins', 'PurchasePrice', 'Subscription', 'Assets', 'DevelopmentExpense', '2Dsupport', '3Dsupport', 'Windows', 'Linux', 'OSX', 'iOS', 'Android', 'Console', 'NextGenConsole', 'C', 'Java', 'HTML5', 'Python', 'OpenSource', 'Commercial');
		?>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Table Scoring System</title>

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
  	<h1 style="text-align:center">Game Engine Scores Chart</h1>
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
			{ #Read through the parameters for the weights dropdown
				if($tmp == 0)
				{ #Skip the name column
					$tmp++;
				}
				else
				{ #Print all but the first column
					echo "<option id=\"weightDropdown$val\">$val</option>";
				}
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
	<div style="width: 45%;margin-left: 0; margin-right:4%; display:inline-block">
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
				{ #Skip the first column (name)
					$tmp++;
				}
				else
				{ #Print all but the 1st column
					echo "<div class=\"form-group\"><label for=\"$val\">$val</label><input size=\"2\" type=\"number\" class=\"form-control\" id=\"$val\" placeholder=\"0-10\" min=\"0\" max=\"10\" onfocus=\"togglePrompt(this.id)\" required></div>";
				}
			}
		?>
		<button type="button" class="btn btn-default form-control" onclick="postJSON()">Submit</button>
	</form>
	</div>
	<div style="width: 50%; display:inline-block;vertical-align: top;overflow-y: auto; height: 600px">
	<?php 
		#Link to the prompts for taking scores from users
		include("prompts.php"); 
	?>
	</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<!-- Bootstrap plugin for multiselect lists -->
	<script src="js/silviomoreto-bootstrap/bootstrap-select.min.js"></script>
	<!-- For sorting and such -->
	<!--<script src="http://listjs.com/no-cdn/list.js"></script>-->
	<script type="text/javascript">
		$(document).ready(function(e) {
      	$('.selectpicker').selectpicker(); // Initialize selectpicker plugin
			$('#colWeight').val(10); // Initialize weight input to 10
			getMySQL(); // Query for database info
			for(var i = 1; i < options['valueNames'].length; i++)
			{ // Hide all the prompts
				$("#Prompt"+options['valueNames'][i]).hide();
			}
		}); // end document.ready()
		  
		// Post grades to server using JSONwriter.php
		function postJSON()
		{
			var jsonData = jQuery.parseJSON('{"EngineName":"'+document.getElementById("EngineName").value+'"<?php foreach($params2 as $val) {if($val != "EngineName") {echo ",\"$val\":'+document.getElementById(\"$val\").value+'";}} ?>}');
			jQuery.post("JSONwriter.php", {json: JSON.stringify(jsonData)}, function() {});
			getMySQL();
			return true;
		} // end postJSON()
		
		// Populate the options array
		var options = {
			"valueNames": [ 
			<?php $tmp = 0; 
			foreach($params2 as $val) 
			{ 
				if($tmp == 0) {$tmp++; echo "\"$val\"";} #No comma for the first value
				else {echo ", \"$val\"";} #Print the rest of the values
			} ?> ] // end options array
		};
		
		// Populate the weights array
		var weights = {
			<?php $tmp = 0;
			foreach($params2 as $val) 
			{
				if($tmp == 0) {$tmp++;}
				else if($tmp == 1) {$tmp++; echo "\"$val\":10";} #No comma for the first value
				else {echo ", \"$val\":10";} #Print the rest of the values
			}?>
		}; // end weights array
		
		// List object for sorting plugin, take this out?
		// var engineList = new List('engines', options);
		
		// Table object
		var tableSort = document.getElementById("jsonTable");
		
		// Filter rows by first column on keyup
		$('#name-search').keyup(function() {
			var searchString = $(this).val().toLowerCase();
			for(var i = 1, row; row = tableSort.rows[i]; i++)
			{
				if(row.cells[1].innerText.toLowerCase().indexOf(searchString) > -1)
				{ // If the search string matches any part of the row name, display it
					row.style.display = "";
				}
				else
				{ // Hide any row names that don't match
					row.style.display = "none";
				}
			} // end for loop
		}); // end row filter
		
		// Toggle Columns by selected dropdown list
		$('#toggleDropdown').on('change', function() {
			var last = -1;
			var found = false;
			if($('#toggleDropdown.selectpicker option:selected').length)
			{ // if there are any selected column
				$('#toggleDropdown.selectpicker option:selected').each(function(index)
				{ // for each selected column
					for(var i = last+1, found = false; i < tableSort.rows[0].cells.length; i++)
					{ // for each column in the current row
						if(!found && $(this).val() == tableSort.rows[0].cells[i].innerHTML)
						{ // check the current column against the selected dropdown
							for(var j = 0; j < tableSort.rows.length; j++)
							{ // If values match, display
								tableSort.rows[j].cells[i].style.display = "";
							}
							last = i;
							found = true;
						}
						else
						{ // If it does not match
							for(var j = 0; j < tableSort.rows.length; j++)
							{ // Hide all columns in current row
								tableSort.rows[j].cells[i].style.display = "none";
							}
						}
					} // end for(selectedRows)
				}); // end selected foreach()
			} // end if selected.length == 0
		}); // end toggle dropdown
		
		function getMySQL() {
			$.get("display.php", function(data) {
				realJSON = $.parseJSON(data);
				// Get table data from display.php
			}).then(function() {
				var tbl_body = "<tbody class=\"list\">";
				var tbl_head;
				var dropdown_body;
				var i = 0;
				$.each(realJSON, function() {
					tbl_head = "<thead><tr><th class=\"sort\" data-sort=\"ID\" style=\"display:none\">ID</th>";
					dropdown_body = "";
					var tbl_row = "<td class=\"id\" style=\"display:none;\">"+i+"</td>";
					i++;
					$.each(this, function(k , v) {
						if(k=='ID')
						{
							// Don't do anything with ID columns
						}
						else
						{ // add to the table row, table head, and dropdown objects
							tbl_row += "<td class=\""+k+"\">"+v+"</td>";
							tbl_head += "<th class=\"sort\" data-sort=\""+k+"\">"+k+"</th>";
							dropdown_body += "<option value="+k+">"+k+"</option>";
						}
					})
					// End the current head and row
					tbl_head += "</tr></thead>";
					tbl_body += "<tr>"+tbl_row+"</tr>";                 
				})
				tbl_body = tbl_head + tbl_body + "</tbody>";
				// Set the table text
				$("table").html(tbl_body);
				// Refresh the table text
				$("#toggleDropdown").html(dropdown_body);
				
			});
			// Render the selectpicker object
			$('.selectpicker').selectpicker('render');
		}
		
		// Select all columns to display
		function selectAll() {
			$('.selectpicker').selectpicker('selectAll');
			$('.selectpicker').selectpicker('render');
		}
		
		// Select no columns to display
		function selectNone() {
			$('.selectpicker').selectpicker('deselectAll');
			$('.selectpicker').selectpicker('val', 'EngineName');
			$('.selectpicker').selectpicker('render');
		}
		
		// Set all weights to 10
		function selectAllWeights() {
			for(var i = 1; i < options['valueNames'].length; i++)
			{
				weights[options['valueNames'][i]] = 10;
			}
			$('#colWeight').val(10);
		}
		
		// Set all weights to 0
		function selectNoWeights() {
			for(var i = 1; i < options['valueNames'].length; i++)
			{
				weights[options['valueNames'][i]] = 0;
			}
			$('#colWeight').val(0);
		}
		
		// Set weights according to visibility
		function selectWeightsByView() {
			if($('#toggleDropdown.selectpicker option:selected').length == 0) 
			{
				/*do nothing*/
			}
			else
			{
				// Reset all weights to 0
				selectNoWeights();
				$('#toggleDropdown.selectpicker option:selected').each(function(index) {
					if($(this).val() != "EngineName")
					{ // If the column is selected
						weights[$(this).val()] = 10;
					}
				});
			}
		}
		
		// Display the current weight for the visible column in the weight dropdown
		$('#weightDropdown').on('change', function() {
			$("#colWeight").val(weights[$("#weightDropdown").val()]);
		});
		
		// Set the weight of a column for every change in the weight select
		$('#colWeight').on('change', function() {
			weights[$("#weightDropdown").val()] = $(this).val();
		});
		
		// Show/Hide prompts for each question according to where the focus is
		function togglePrompt(id) {
			for(var i = 1; i < options['valueNames'].length; i++)
			{
				$("#Prompt"+options['valueNames'][i]).hide();
			}
			$("#Prompt"+id).show();
		} // end togglePrompt(id)
		
		var scoreList;
		var nameArray = [];
		var scoreArray = [];
		
		// Refresh the display of the weights above the table
		function refreshWeights() {
			var total = 0;
			var name = "";
			var fullString = "";
			for(var i = 1, row; row = tableSort.rows[i]; i++)
			{ // for each row in the jsonTable object
				scoreArray[i-1] = 0;
				for(var j = 1, col; col = row.cells[j]; j++)
				{ // for each column in the jsonTable object
					if(j==1)
					{ // if j==1, put this in the name array
						nameArray[i-1] = col.innerHTML;
					}
					else
					{ // add the weighted score to the score array
						scoreArray[i-1] = scoreArray[i-1] + (weights[options['valueNames'][j-1]] * col.innerHTML / 10);
					}
				} // end for(columns in rows in jsonTable)
			} // for(rows in jsonTable)
			sortScores();
			if(nameArray.length < 6)
			{ // Adds first 5 scores to the fullString variable
				for(var q = 0; q < nameArray.length; q++)
				{ // for each name in the name array
					fullString += "<li class=\"list-group-item\">"+nameArray[q]+": "+scoreArray[q]+"</li>";
				}
			}
			else
			{ // for the rest of the scores (if you want to limit to the first 5 scores)
				for(var q = 0; q < 5; q++)
				{
					fullString += "<li class=\"list-group-item\">"+nameArray[q]+": "+scoreArray[q]+"</li>";
				}
			}
			// Add fullString to the scoreList object to be seen
			$("#scoreList").html(fullString);
		} // end refreshWeights()
		
		// Sort scores array in descending order
		function sortScores() {
			var tempScore = [];
			var tempName = [];
			var lastIT = -1;
			for(var j = 0; j < scoreArray.length; j++)
			{ // for each score
				tempScore[j] = -1;
				for(var i = 0; i < scoreArray.length; i++)
				{ // for each score
					if(scoreArray[i] > tempScore[j])
					{ // if the score > the current highest, it becomes highest
						lastIT = i;
						tempScore[j] = scoreArray[i];
					}
				}
				tempName[j] = nameArray[lastIT];
				scoreArray[lastIT] = -2;
			}
			for(var j = 0; j < scoreArray.length; j++)
			{ // replace the original arrays with the sorted temp arrays
				nameArray[j] = tempName[j];
				scoreArray[j] = tempScore[j];
			}
		} // end sortScores()
		
	</script>
  </body>
</html>
