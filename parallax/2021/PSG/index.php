<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>OTSUKA VISITORS ACTIVITY MONITORING</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css"/>
    
    <style type="text/css">

        div > a > img {
            display: none;
        }
        

        table thead tr td {
            color: #fff;
            font-weight: bold;
        }

        [data-tag=N] {
            color: #dc3545!important;
        }

        .divDate {
            background-color: #082E91!important;
        }

        .date {
            color: #fff;
            margin: 1rem;
        }
    </style>


</head>
<body>
    <div class="row p-5">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <h2> OTSUKA VISITORS ACTIVITY MONITORING - PSG </h2>
            </div>

            <div class="d-flex justify-content-end mb-3">
                <div class="divDate">
                    <p id="date" class="date"></p> 
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="table_id">
                    <thead>
                        <tr style="background-color: #082E91">
                            <td scope="col">#</td>
                            <td scope="col">DATE</td>
                            <td scope="col">NAME</td>
                            <td scope="col">SPECIALTY</td>
                            <td scope="col">CLINIC</td>
                            <td scope="col">EMAIL ADDRESS</td>
                            <td scope="col">CONVENTION</td>
                            <td scope="col">BFLUID</td>
                            <td scope="col">HINEX</td>
                            <td scope="col">MEPTIN</td>
                            <td scope="col">MUCOSTA</td>
                            <td scope="col">AMINOLEBAN</td>
                            <td scope="col">NEOMUNE</td>
                            <td scope="col">PRODUCTS</td>
                            <td scope="col">STUDIES</td>
                            <td scope="col">TIME REMAINING</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        $servername = "localhost";
                        $username = "u480472038_otsuka";
                        $password = "RNJA@bcpi2021";
                        $database = "u480472038_otsuka";

                        //$conn = mysqli_connect('localhost', 'root', '', 'otsuka'); //dev
                        $conn = mysqli_connect($servername, $username, $password, $database);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        
                        $sql = "SELECT * FROM registration WHERE convention = 'PSG'";
                        $result = $conn->query($sql);
                        $ctr = 1;
                        
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $bfluid = ($row['bfluid']) ? "Y" : "N";
                                $hinex = ($row['hinex']) ? "Y" : "N";
                                $meptin = ($row['meptin']) ? "Y" : "N";
                                $mucosta = ($row['mucosta']) ? "Y" : "N";
                                $aminoleban = ($row['aminoleban']) ? "Y" : "N";
                                $neomune = ($row['neomune']) ? "Y" : "N";
                                $products = ($row['products']) ? "Y" : "N";
                                $studies = ($row['studies']) ? "Y" : "N";
                                echo"
                                    <tr>
                                        <th scope='row'>" . $ctr++ . "</th>
                                        <td>" . $row['creation_date'] . "</td>
                                        <td>" . $row['fname'] . "</td>
                                        <td>" . $row['specialist'] . "</td>
                                        <td>" . $row['clinic'] . "</td>
                                        <td>" . $row['email'] . "</td>
                                        <td>" . $row['convention'] . "</td>
                                        <td data-tag=" . $bfluid . ">" . $bfluid . "</td>
                                        <td data-tag=" . $hinex . ">" . $hinex . "</td>
                                        <td data-tag=" . $meptin . ">" . $meptin . "</td>
                                        <td data-tag=" . $neomune . ">" . $neomune . "</td>
                                        <td data-tag=" . $aminoleban . ">" . $aminoleban . "</td>
                                        <td data-tag=" . $neomune . ">" . $neomune . "</td>
                                        <td data-tag=" . $products . ">" . $products . "</td>
                                        <td data-tag=" . $studies . ">" . $studies . "</td>
                                        <td data-tag=" . $row['mucosta_word_search'] . ">" . $row['mucosta_word_search'] . "</td>
                                    </tr>";
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
    
    <script>
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        n =  new Date();
        y = n.getFullYear();
        m = monthNames[n.getMonth()];
        d = n.getDate();
        document.getElementById("date").innerHTML = "DATE: " + m + " " + d + ", " + y;
    </script>

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
                        title: 'OTSUKA',
                        exportOptions: {
                            columns: ':not(.donotexport)'
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        title: 'OTSUKA',
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