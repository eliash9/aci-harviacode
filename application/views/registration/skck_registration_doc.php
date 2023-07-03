<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Skck_registration List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Applicant Id</th>
		<th>Applicant Name</th>
		<th>Applicant Email</th>
		<th>Unit Type</th>
		<th>Reg Type</th>
		<th>Status Type</th>
		<th>Purpose Desc</th>
		<th>Staff Id</th>
		<th>Application Id</th>
		<th>Print Id</th>
		<th>Timestamps</th>
		
            </tr><?php
            foreach ($registration_data as $registration)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $registration->applicant_id ?></td>
		      <td><?php echo $registration->applicant_name ?></td>
		      <td><?php echo $registration->applicant_email ?></td>
		      <td><?php echo $registration->unit_type ?></td>
		      <td><?php echo $registration->reg_type ?></td>
		      <td><?php echo $registration->status_type ?></td>
		      <td><?php echo $registration->purpose_desc ?></td>
		      <td><?php echo $registration->staff_id ?></td>
		      <td><?php echo $registration->application_id ?></td>
		      <td><?php echo $registration->print_id ?></td>
		      <td><?php echo $registration->timestamps ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>