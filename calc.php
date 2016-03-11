<?php $this->title = "Dashboard"; ?>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    </head>
    <body>

    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Values Table</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body chart-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Value</th>
                        <th>Cost</th>
                    </tr>
                    <?php
                    foreach ($money as $mon)
                    {
                        echo '<tr>';
                        echo '<td>' . $mon['name'] . '</td>';
                        echo '<td>' . $mon['course'] . '</td>';
                        echo '</tr>';
                    } ?>
                </table>

            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>

    <div class="col-md-2">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Calculator</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body chart-responsive">
                <form>
                    <label for="a">First Number</label>
                    <input type="text" class="form-control" id="x" placeholder="Enter First Number"/>
                    <br/>
                    <label for="b">Second Number</label>
                    <input type="text" class="form-control" id="y" placeholder="Enter Second Number"/>
                    <br/>
                    <input type="button" class="btn btn-block btn-primary" id="addButton" value="Add"/>
                    <input type="button" class="btn btn-block btn-success" id="deductButton" value="Substract"/>
                    <input type="button" class="btn btn-block btn-info" id="multButton" value="Multiply"/>
                    <input type="button" class="btn btn-block btn-warning" id="divideButton" value="Divide"/>
                    <br/>

                    <label for="c">Your Score</label>
                    <input type="text" class="form-control" id="output" placeholder="Your Score"/>
                    <br/>

                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>

    <script>
        //checking avalibality of web workers
        if (window.Worker) {

            var x, y, message;

            /* Create a new worker */
            arithmeticWorker = new Worker("../js/arithmetic.js");

            //Add a event listener to the worker, this will be called when the worker posts a message.

            arithmeticWorker.onmessage = function (event) {
                document.getElementById("output").value = event.data;
            };

            //events for buttons
            document.getElementById("addButton").onclick = function () {
                /* Get the values to do operation on */
                x = parseFloat(document.getElementById("x").value);
                y = parseFloat(document.getElementById("y").value);
                message = {
                    'op': 'add',
                    'x': x,
                    'y': y
                };

                arithmeticWorker.postMessage(message);
            }

            document.getElementById("deductButton").onclick = function () {
                /* Get the values to do operation on */
                x = parseFloat(document.getElementById("x").value);
                y = parseFloat(document.getElementById("y").value);
                message = {
                    'op': 'deduct',
                    'x': x,
                    'y': y
                };

                arithmeticWorker.postMessage(message);
            }

            document.getElementById("multButton").onclick = function () {
                /* Get the values to do operation on */
                x = parseFloat(document.getElementById("x").value);
                y = parseFloat(document.getElementById("y").value);
                message = {
                    'op': 'mult',
                    'x': x,
                    'y': y
                };
                arithmeticWorker.postMessage(message);
            }

            document.getElementById("divideButton").onclick = function () {
                /* Get the values to do operation on */
                x = parseFloat(document.getElementById("x").value);
                y = parseFloat(document.getElementById("y").value);
                message = {
                    'op': 'divide',
                    'x': x,
                    'y': y
                };

                arithmeticWorker.postMessage(message);
            }


        } else {
            alert("Not Supported");
        }
        ;
    </script>


    </body>

<?php
//foreach ($money as $mon)
//{
//    echo '<table>';
//    echo '<tr>';
//    echo '<td>' . $mon['name'] . '</td>';
//    echo '<td>' . $mon['course'] . '</td>';
//    echo '</tr>';
//    echo '</table>';
//}
//?>