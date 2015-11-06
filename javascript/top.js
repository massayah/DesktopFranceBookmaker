

$(function() {
		$( ".top4-group li" ).draggable({
			appendTo: "body",
			helper: "clone"
		}); 
		$( "#top4-choice1 ul" ).droppable({
			activeClass: "ui-state-default1",
			hoverClass: "ui-state-hover1",
			accept: ":not(.ui-sortable-helper1)",
			drop: function( event, ui ) {
			if (ui.draggable.text() != $("#team2").text() && ui.draggable.text() != $("#team3").text() && ui.draggable.text() != $("#team4").text())
				{
				$( this ).find( ".placeholder1" ).remove();
				if ( $("#team1").length == 0)
				{
					$( "<li id=\"team1\" name=\"team1\"></li>" ).text( ui.draggable.text() ).appendTo( this );
					$("#hiddenteam1").val($("#team1").text());
				}
					else
				{
						$("#team1").remove();
						$( "<li id=\"team1\" name=\"team1\"></li>" ).text( ui.draggable.text() ).appendTo( this );
						$("#hiddenteam1").val($("#team1").text());
				}
			}
			}
		});
	});

	$(function() {
		$( ".top4-group li" ).draggable({
			appendTo: "body",
			helper: "clone"
		}); 
		$( "#top4-choice2 ul" ).droppable({
			activeClass: "ui-state-default2",
			hoverClass: "ui-state-hover2",
			accept: ":not(.ui-sortable-helper2)",
			drop: function( event, ui ) {
				if (ui.draggable.text() != $("#team1").text() && ui.draggable.text() != $("#team3").text() && ui.draggable.text() != $("#team4").text())
				{
				$( this ).find( ".placeholder2" ).remove();
				if ( $("#team2").length == 0)
				{
					$( "<li id=\"team2\"></li>" ).text( ui.draggable.text() ).appendTo( this );
					$("#hiddenteam2").val($("#team2").text());
				}
				else
				{
						$("#team2").remove();
						$( "<li id=\"team2\"></li>" ).text( ui.draggable.text() ).appendTo( this );
						$("#hiddenteam2").val($("#team2").text());
				}
				}
			}
		});
	});
	
	$(function() {
		$( ".top4-group li" ).draggable({
			appendTo: "body",
			helper: "clone"
		}); 
		$( "#top4-choice3 ul" ).droppable({
			activeClass: "ui-state-default3",
			hoverClass: "ui-state-hover3",
			accept: ":not(.ui-sortable-helper3)",
			drop: function( event, ui ) {
			if (ui.draggable.text() != $("#team1").text() && ui.draggable.text() != $("#team2").text() && ui.draggable.text() != $("#team4").text())
				{
				$( this ).find( ".placeholder3" ).remove();
				if ( $("#team3").length == 0)
				{
					$( "<li id=\"team3\"></li>" ).text( ui.draggable.text() ).appendTo( this );
					$("#hiddenteam3").val($("#team3").text());
				}
				else
					{
						$("#team3").remove();
						$( "<li id=\"team3\"></li>" ).text( ui.draggable.text() ).appendTo( this );
						$("#hiddenteam3").val($("#team3").text());
					}
				}
			}
		});
	});
	
	$(function() {
		$( ".top4-group li" ).draggable({
			appendTo: "body",
			helper: "clone"
		}); 
		$( "#top4-choice4 ul" ).droppable({
			activeClass: "ui-state-default4",
			hoverClass: "ui-state-hover4",
			accept: ":not(.ui-sortable-helper4)",
			drop: function( event, ui ) {
			if (ui.draggable.text() != $("#team1").text() && ui.draggable.text() != $("#team2").text() && ui.draggable.text() != $("#team3").text())
				{
				$( this ).find( ".placeholder4" ).remove();
				if ( $("#team4").length == 0)
				{
					$( "<li id=\"team4\"></li>" ).text( ui.draggable.text() ).appendTo( this );
					$("#hiddenteam4").val($("#team4").text());
				}
				else
					{
						$("#team4").remove();
						$( "<li id=\"team4\"></li>" ).text( ui.draggable.text() ).appendTo( this );
						$("#hiddenteam4").val($("#team4").text());
					}
				}
			}
		});
	});