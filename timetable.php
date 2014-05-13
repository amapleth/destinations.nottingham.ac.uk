<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mszadm
 * Date: 09/10/2013
 * Time: 13:08
 * To change this template use File | Settings | File Templates.
 */
 $timetable_classes = Array
     (
     [0] => stdClass Object
(
    [class_id] => 1
        [class_name] => Fit Box
        [class_description] => Fitbox is a high energy aerobic workout utilizing focus pads, kick pads, heavy bags, and speed balls. This class increases muscle strength and cardiovascular fitness and also includes strength and endurance circuit style training. Excellent for co-ordination, reflexes and to pump out the adrenalin!  The class is 1 hour in duration.
    [class_time] => 06:00:00
        [class_day] => Tuesday
        [class_status] => active
        [class_colour] => Blue
    )

[1] => stdClass Object
(
    [class_id] => 2
        [class_name] => Hot Boxing
        [class_description] => test description
        [class_time] => 08:00:00
        [class_day] => Wednesday
        [class_status] => active
        [class_colour] => grey
    )

[2] => stdClass Object
(
    [class_id] => 3
        [class_name] => Punch Face
        [class_description] => test again
        [class_time] => 07:00:00
        [class_day] => Thursday
        [class_status] => active
        [class_colour] => grey
    )

[3] => stdClass Object
(
    [class_id] => 4
        [class_name] => MOS
        [class_description] => test again
        [class_time] => 07:00:00
        [class_day] => Thursday
        [class_status] => active
        [class_colour] => grey
    )

)

$output = '<table class="calendar">';
        $output .= '<thead>
                        <tr>
                            <th colspan="8">Classes</th>
                        </tr>
                        <tr>
                            <th class="day"></th>
                            <th class="day">Sunday</th>
                            <th class="day">Monday</th>
                            <th class="day">Tuesday</th>
                            <th class="day">Wednesday</th>
                            <th class="day">Thursday</th>
                            <th class="day">Friday</th>
                            <th class="day">Saturday</th>
                        </tr>
                    </thead>';

                    print_r($timetable_classes);

                    foreach($timetable_classes as $k => $h)
                    {
                        //start the row
                        $output .= '<tr><td>'.format_time($h['time']).'</td>';

                        //now loop through your array and check hour and day, and display
                        foreach($timetable_classes as $a)
                        {
                            if($a->class_time === $h['time'])
                            {
                                if($a->class_day === "Sunday"){
                                    $output .= '<td>'.$a->class_name.'</td>';
                                }else {
                                    $output .= '<td></td>';
                                }

                                if($a->class_day === "Monday"){
                                    $output .= '<td>'.$a->class_name.'</td>';
                                }else {
                                    $output .= '<td></td>';
                                }

                                if($a->class_day === "Tuesday"){
                                    $output .= '<td>'.$a->class_name.'</td>';
                                }else {
                                    $output .= '<td></td>';
                                }

                                if($a->class_day === "Wednesday"){
                                    $output .= '<td>'.$a->class_name.'</td>';
                                }else {
                                    $output .= '<td></td>';
                                }

                                if($a->class_day === "Thursday"){
                                    $output .= '<td>'.$a->class_name.'</td>';
                                }else {
                                    $output .= '<td></td>';
                                }

                                if($a->class_day === "Friday"){
                                    $output .= '<td>'.$a->class_name.'</td>';
                                }else {
                                    $output .= '<td></td>';
                                }

                                if($a->class_day === "Saturday"){
                                    $output .= '<td>'.$a->class_name.'</td>';
                                }else {
                                    $output .= '<td></td>';
                                }

                                // if there are not event on create blank cell
                                if(empty($a->class_day)){
                                    $output .= '<td></td>';
                                }
                            }
                        }
                        $output .= '</tr>';
                    }

        $output .= '</table>';

        print $output;