<?php

    require "con_db.php";

                $piet_SQL = "SELECT * FROM it_pieteikumi where izmantots = '1' ORDER BY datums DESC LIMIT 7";
                $atlasa_piet_SQL = mysqli_query($savienojums, $piet_SQL);
                
                while($pieteikums = mysqli_fetch_array($atlasa_piet_SQL)){
                    echo "
                    <tr>
                    <td>{$pieteikums['vards']} {$pieteikums['uzvards']}</td>
                  
                    <td>".date("d.m.Y. H:i", strtotime($pieteikums['datums']))."</td>
                      <td>{$pieteikums['statuss']}</td>
                    </tr>
                    ";
                }
                ?>