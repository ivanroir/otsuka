<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OTSUKA - Messages</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css"/>

    
    <style type="text/css">
    
        div > a > img {
            display: none;
        }
        
        [data-tag=N] {
            color: #dc3545!important;
        }

        .divDate {
            background-color: #00793f !important;
        }

        .date {
            color: #fff;
            margin: 1rem;
        }

        body {
            overflow-x: hidden;
        }
    </style>

</head>
<body>
    <div class="row p-5">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <h2>OTSUKA - Messages</h2>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table_id">
                    <thead>
                        <tr style="background-color: #003079; color: white;">
                            <td scope="col">#</td>
                            <td scope="col">NAME</td>
                            <td scope="col">SPECIALTY</td>
                            <td scope="col">EMAIL</td>
                            <td scope="col">MESSAGE</td>
                            <td scope="col">CREATION DATE</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        $servername = "localhost";
                        $username = "u480472038_otsuka";
                        $password = "RNJA@bcpi2021";
                        $database = "u480472038_otsuka";
                        
                        //$conn = mysqli_connect('localhost', 'root', '', 'ndap'); //dev
                        $conn = mysqli_connect($servername, $username, $password, $database);
    
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM otsuka_message WHERE fname <>''";
                        $result = $conn->query($sql);
                        $ctr = 1;

                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {

                                echo"
                                        <tr>                                         
                                            <th scope='row'>" . $ctr++ . "</th>
                                            <td>" . $row['fname'] . "</td>
                                            <td>" . $row['specialist'] . "</td>
                                            <td>" . $row['email'] . "</td>
                                            <td>" . $row['message'] . "</td>
                                            <td>" . $row['creation_date'] . "</td>
                                        </tr>
                                    ";
                            }
                        }
                        else {
                            echo "
                                <tr>
                                    <td>Empty</td>
                                </tr>
                            ";
                        }
                        $conn->close();
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>    

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table_id').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: 'NDAP-ANCON',
                        exportOptions: {
                            columns: ':not(.donotexport)'
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        title: 'NDAP-ANCON',
                        exportOptions: {
                            columns: ':not(.donotexport)'
                        }
                    }                    
                ]
            });
        });
    </script>
</body>
</html>