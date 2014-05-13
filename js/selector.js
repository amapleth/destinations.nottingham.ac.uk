
$(document).ready( function() {

	// set up the school/jacs selecter toggle
	$("#jacsselecter").hide();
	$("#schoolfilter").click( function() {
		$("#jacsselecter").fadeOut(500, function() {
			$("#schoolselecter").fadeIn(500);
		});
	});
	$("#jacsfilter").click( function() {
		$("#schoolselecter").fadeOut(500, function() {
			$("#jacsselecter").fadeIn(500);
		});
	});

	// function to recalculate the population counts when a relevant form input changes
	$("#selecterform input, #selecterform select").change( function() {
		var selectparams = new Array();
		$("#selecterform input, #selecterform select").each( function() {
			selectparams[$(this).attr("id")] = $(this).val();
		});
//		console.log('school: '+$("#school").val());
//		console.log('subject: '+ $("#subject").val());
//		console.log('course: '+$("#course").val());
//		console.log('jacs1: '+$("#jacs1").val());
//		console.log('jacs2: '+$("#jacs2").val());
//		console.log('jacs3: '+$("#jacs3").val());
//		console.log('filtertype: '+$("input:radio[name=filtertype]:checked").val());
//		console.log( $("#yearselector").val() );
		$.getJSON( "selectchange.php", { 'school': $("#school").val(), 'subject': $("#subject").val(), 'course': $("#course").val(), 'filtertype': $("input:radio[name=filtertype]:checked").val(), 'jacs1': $("#jacs1").val(), 'jacs2': $("#jacs2").val(), 'jacs3': $("#jacs3").val(), 'surveyyears': $("#yearselector").val() }, function(data) {
			console.log(data);
			for (var i in data) {

				if ( i == 'all' ) {
					$("#ftptalldisplay").html( data[i] );
					$("#ugpgalldisplay").html( data[i] );
					$("#levelalldisplay").html( data[i] );
					$("#homeeualldisplay").html( data[i] );
				} else {
					$("#"+i+"display").html( data[i] )
				}
			}
		});

		var selschool = $("#school").val();
		var selsubject = $("#subject").val();
		var selcourse = $("#course").val();
		var subjarray = new Array();
		var subhtml = "<option value='all'";

		// now we've changed the counts, we need to change the content of the subject and course select menus
		if ( selschool != 'all' ) {
			subjarray = schools[selschool]['subjects'];
			subhtml += ">All "+selschool+" "+option2s+"</option>";
		} else {
			subjarray = subjects;
			subhtml += ">All "+option2s+"</option>";
		}
		for (var sub in subjarray) {
			subhtml += "<option value='"+sub+"'";
			if ( sub == selsubject ) { subhtml += " selected='selected'"; }
			subhtml += ">"+sub+"</option>\n";
		}
		$("#subject").html(subhtml);
		
		var coursearray = new Array();
		var coursehtml = "<option value='all'>All ";
		var coursehash = new Array();


		if ( selsubject != 'all' ) {

			if ( selschool == 'all') {
			// some subjects are in multiple schools. If no school is selected traverse the tree and aggregate

				for ( var sch in schools ) {
					for ( var sub in schools[sch]['subjects'] ) {
						if ( sub == selsubject ) {
							for ( var crs in schools[sch]['subjects'][sub]['courses'] ) {
								coursehash[crs] = 1;
							}
						}
					}
				}

			} else {
			// otherwise get the courses that belong to that school and subject

				coursehtml += selsubject+' courses</option>'
				for ( var crs in schools[selschool]['subjects'][selsubject]['courses'] ) {
					coursehash[crs] = 1;
				}
			}
			
			for ( var crs in coursehash ) {
				coursearray.push( crs );
			}

		} else {

			if (selschool != 'all') {
				// fall back to get all courses for a school

				for ( var sub in schools[selschool]['subjects'] ) {
					for ( var crs in schools[selschool]['subjects'][sub]['courses'] ) {
						coursehash[crs] = 1;
					}
				}

				for ( var crs in coursehash ) {
					coursearray.push( crs );
				}

			} else {
				// getting full course list
				for ( var crs in courses ) {
					coursearray.push( crs );
				}

			}
		}


		for ( var i in coursearray ) {
//			console.log(coursearray[coursename]);
			coursehtml += "<option value='"+coursearray[i]+"'";
			if ( coursearray[i] == selcourse ) { coursehtml += " selected='selected'"; }
			coursehtml += ">"+coursearray[i]+"</option>";
		}

		$("#course").html(coursehtml);

		// ok now we need to do the same with the JACS codes
		var selj1 = $("#jacs1").val();
		var selj2 = $("#jacs2").val();
		var selj3 = $("#jacs3").val();
		var j2array = new Array();
		var j2html = "<option value='all'>All graduates</option>";

		if ( selj1 != 'all' ) {
			j2array = jacs1s[selj1]['lev2s'];
		} else {
			j2array = jacs2s;
		}

		for (var j2 in j2array) {
			j2html += "<option value='"+j2+"'";
			if ( j2 == selj2 ) { j2html += " selected='selected'"; }
			j2html += ">"+jacs2names[j2]+"</option>\n";
		}
		$("#jacs2").html(j2html);

		var j3array = new Array();
		var j3html = "<option value='all'>All graduates</option>";

		if ( selj2 != 'all') {
			if ( selj1 != 'all' ) {
				j3array = jacs1s[selj1]['lev2s'][selj2]['lev3s'];
			} else {
				for ( var j1 in jacs1s ) {
					if ( jacs1s[j1]['lev2s'][selj2] !== undefined ) {
						j3array = jacs1s[j1]['lev2s'][selj2]['lev3s'];
					}
				}
			}
		} else {
			j3array = jacs3s;
		}

		for ( var j3 in j3array ) {
			j3html += "<option value='"+j3+"'";
			if ( j3 == selj3 ) { j3html += " selected='selected'"; }
			j3html += ">"+jacs3names[j3]+"</option>";
		}
		$("#jacs3").html(j3html);

	});

});