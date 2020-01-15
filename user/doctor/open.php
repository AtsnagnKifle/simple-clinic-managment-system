<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Treate</title>
    <link rel="stylesheet" href="../../statics/css/bulma.css">
</head>

<body class="has-text-weight-light">

    <div class="columns">
        <?php include_once 'nav.php';?>
        <div class="column">
            <div class="columns">
                <div class="column is-centered has-text-centered">
                    <br>
                    <div class="columns">
                        <div class="column">
                            <div class="content has-text-left" style="padding-left: 30%;">
                                <h6>Name: </h6>
                                <h6>ID: </h6>
                                <h6>Age: </h6>
                                <h6>Gender: </h6>
                                <h6>Email: </h6>
                                <h6>Phone Number: </h6>
                                <h6>Address: </h6>
                            </div>
                        </div>
                        <div class="column">
                            <figure class="image profile-img is-128x128">
                                <img class="is-rounded" src="images/128x128.png">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns"><br>
                <div class="column">
                    <nav class="panel is-shadowless">
                        <p class="panel-tabs">
                            <a class="is-active" id="his-activator">Medical History</a>
                            <a id="lab-activator">Laboratory Results</a>
                            <a id="med-activator">Prescribe Medicine</a>
                            <a id="ref-activator">Requests</a>
                        </p>
                        <div class="panel-block">
                            <div id="his" class="column is-10 section" style="margin: auto;">
                                <div class="table-container">
                                    <table class="table is-success">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Doctor</th>
                                                <th>Symptoms</th>
                                                <th><abbr title="Lab Result">Lab</abbr></th>
                                                <th>Diagnosis</th>
                                                <th>Prescriptions</th>
                                                <th>Doctor's Notes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                            
                                            <tr>
                                                <th>12/22/2019</th>
                                                <td><a href="#"><b>Doctor1</b></a></td>
                                                <td>
                                                    symptom a
                                                    symptom b
                                                    symptom c
                                                </td>
                                                <td>
                                                    test1 => result1
                                                </td>
                                                <td>Diagnosis1</td>
                                                <td><a href="#">Medicine1, Medicine2</a></td>
                                                <td>Multi line note by doc</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="panel-block is-10 column" id="lab" style="display: none;">
                                <div class="columns">

                                    <div class="column">
                                        <div class="has-text-centered control" id="lab_results">
                                            <ol>
                                                <li><a href="#">Results 1</a></li>
                                                <li><a href="#">Results 2</a></li>
                                                <li><a href="#">Results 3</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="panel-block" id="med" style="display: none;">

                                <div class="has-text-centered" id="med_selections">
                                    <br>
                                    <div class="field has-addons ">

                                        <div class="control is-expanded" style="margin: auto;">
                                            <div class="label has-text-weight-light">Select Medicine </div>
                                            <select name="selector" class="input is-expanded">
                                                <option value="Medicine 1">Medicine 1</option>
                                                <option value="Medicine 1">Medicine 2</option>
                                                <option value="Medicine 1">Medicine 3</option>
                                                <option value="Medicine 1">Medicine 4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="field"><input type="button" class="button is-success" value="Prescribe">
                                    </div>
                                </div>

                            </div>
                            <div class="panel-block column is-centered is-4" id="ref" style="display: none;">

                                <div class="level">
                                    <div class="level-left">Labratory Tests</div>
                                    <div class="level-right">
                                        <button class="button is-success"
                                            onclick="document.getElementById('lab_test_modal').setAttribute('class','modal is-active')">Request</button>
                                        <div class="modal" id='lab_test_modal'>
                                            <div class="modal-background">
                                                <div class="columns">
                                                    <div class="column"></div>
                                                    <div class="column is-6 is-vcentered ">
                                                        <div class="column">
                                                            <br><br>
                                                        </div>
                                                        <div class="hero is-white">

                                                            <div class="column" style="padding:5%;">
                                                                <div class="container has-text-centered content">
                                                                    <div class="title has-text-weight-light">
                                                                        Labratory Request
                                                                    </div>
                                                                    <div class="has-text-centered" id="lab_reports">
                                                                        <p>
                                                                            Add labratory tests to be conducted from the
                                                                            list
                                                                        </p>
                                                                        <div id="selected"
                                                                            class="is-narrow has-addons is-gapless">
                                                                        </div>
                                                                        <br>
                                                                        <div class="field has-addons ">

                                                                            <div class="control is-expanded"
                                                                                style="margin: auto;">
                                                                                <select name="selector" id="selector"
                                                                                    class="input is-expanded">
                                                                                </select>
                                                                            </div>
                                                                            <div class="control">
                                                                                <a class="button is-info"
                                                                                    onclick=selected(event)
                                                                                    id="add_button">Add</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="field"><input type="button"
                                                                                class="button is-success"
                                                                                value="Submit"></div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="column"><br><br></div>
                                                    </div>
                                                    <div class="column"></div>
                                                </div>
                                            </div>

                                            <button class="modal-close is-large" aria-label="close"
                                                onclick="document.getElementById('lab_test_modal').setAttribute('class','modal')"></button>
                                        </div>

                                    </div>
                                </div>
                                <div class="level">
                                    <div class="level-left">Special Food</div>
                                    <div class="level-right">
                                        <button class="button is-success"
                                            onclick="document.getElementById('special_food_modal').setAttribute('class','modal is-active')">Request</button>
                                        <div class="modal" id='special_food_modal'>
                                            <div class="modal-background">
                                                <div class="columns">
                                                    <div class="column"></div>
                                                    <div class="column is-6 is-vcentered ">
                                                        <div class="column">
                                                            <br><br>
                                                        </div>
                                                        <div class="hero is-white">

                                                            <div class="column" style="padding:5%;">
                                                                <div class="container has-text-centered content">
                                                                    <form action="back/request_special_food.php" method="POST">
                                                                    <div class="title">
                                                                        Special Food Request
                                                                    </div>
                                                                    <div class="field">

                                                                        <div class="control">
                                                                            <label class="label">Reason: </label>
                                                                            <textarea name="special_food_request_reason"
                                                                                id="sfrr" cols="30" rows="5"
                                                                                class="textarea"></textarea>
                                                                        </div>
                                                                        <br>
                                                                        <div class="field">
                                                                            <div class="control">
                                                                                <label class="label">Condition:</label>
                                                                                <select class="input"
                                                                                    name="select_hospital"
                                                                                    id="hospital">
                                                                                    <option>Condition 1</option>
                                                                                    <option>Condition 2</option>
                                                                                    <option>Condition 3</option>
                                                                                    <option>Condition 4</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="button is-success is-large"
                                                                            style="margin: auto;"
                                                                            onclick="document.getElementById('special_food_modal').setAttribute('class','modal')"
                                                                            >
                                                                            <input type="submit" value="Submit" class="button is-success is-large">
                                                                        </div>
                                                                        <br>
                                                                        <div class="button is-danger"
                                                                            style="margin: auto;"
                                                                            onclick="document.getElementById('special_food_modal').setAttribute('class','modal')">
                                                                            Cancel
                                                                        </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="column"><br><br></div>
                                                    </div>
                                                    <div class="column"></div>
                                                </div>
                                            </div>

                                            <button class="modal-close is-large" aria-label="close"
                                                onclick="document.getElementById('special_food_modal').setAttribute('class','modal')"></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="level">

                                    <div class="level-left">Referral</div>
                                    <div class="level-right">

                                        <button class="button is-success"
                                            onclick="document.getElementById('referral_modal').setAttribute('class','modal is-active')">Request</button>
                                        <div class="modal" id='referral_modal'>
                                            <div class="modal-background">
                                                <div class="columns">
                                                    <div class="column"></div>
                                                    <div class="column is-6 is-vcentered ">
                                                        <div class="column">
                                                            <br><br>
                                                        </div>
                                                        <div class="hero is-white">
                                                            <div class="column" style="padding:5%;">
                                                                <div class="container has-text-centered content">
                                                                    <div class="title">Referral</div>
                                                                    <div class="field">

                                                                        <div class="control">
                                                                            <label class="label">Reason: </label>
                                                                            <textarea name="referral_reason" id="rr"
                                                                                cols="30" rows="5"
                                                                                class="textarea"></textarea>
                                                                        </div>
                                                                        <br>
                                                                        <div class="field">
                                                                            <div class="control">
                                                                                <label class="label">To:</label>
                                                                                <select class="input"
                                                                                    name="select_hospital"
                                                                                    id="hospital">
                                                                                    <option>Test hospital 1</option>
                                                                                    <option>Test hospital 2</option>
                                                                                    <option>Test hospital 3</option>
                                                                                    <option>Test hospital 4</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="button is-success is-large"
                                                                            style="margin: auto;"
                                                                            onclick="document.getElementById('referral_modal').setAttribute('class','modal')">
                                                                            Submit
                                                                        </div>
                                                                        <br>
                                                                        <div class="button is-danger"
                                                                            style="margin: auto;"
                                                                            onclick="document.getElementById('referral_modal').setAttribute('class','modal')">
                                                                            Cancel
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="column"><br><br></div>
                                                    </div>
                                                    <div class="column"></div>
                                                </div>
                                            </div>

                                            <button class="modal-close is-large" aria-label="close"
                                                onclick="document.getElementById('referral_modal').setAttribute('class','modal')"></button>
                                        </div>

                                    </div>

                                </div>
                                <div class="level">
                                    <div class="level-left">Request Nurse</div>
                                    <div class="level-right">
                                        <button class="button is-success" onclick="document.getElementById('nurse_modal').setAttribute('class','modal is-active')">Request</button>
                                        <div class="modal" id='nurse_modal'>
                                            <div class="modal-background">
                                                <div class="columns">
                                                    <div class="column"></div>
                                                    <div class="column is-6 is-vcentered ">
                                                        <div class="column">
                                                            <br><br>
                                                        </div>
                                                        <div class="hero is-white">
                                                            <div class="column" style="padding:5%;">
                                                                <div class="container has-text-centered content">
                                                                    <div class="title">Request Nurse</div>

                                                                    <div class="title has-text-weight-bold">
                                                                        Are you sure you want to continue?
                                                                    </div>
                                                                    <button class="button is-success is-large" onclick="document.getElementById('nurse_modal').setAttribute('class','modal')">Yes</button>
                                                                    <br>
                                                                    <button class="button is-danger has-text-weight-bold" onclick="document.getElementById('nurse_modal').setAttribute('class','modal')">No</button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="column"><br><br></div>
                                                    </div>
                                                    <div class="column"></div>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                

                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </div>
    <script src="../../statics/js/panel.js"></script>

</body>


</html>

