<!DOCTYPE html>
<html lang="en">
  <head>
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h2>JAWABAN</h2> 
      <p align="right">NAMA : ANDREAS SAHABAT LUMBAN BATU</p>
      <hr>
      <p>Silhkan pilih menu soal pada table</p>
          <table class="table table-bordered">
        <thead>
          <tr>
            <th>SOAL 1</th>
            <th>SOAL 2</th>
            <th>SOAL 3</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="vertical-align: middle;"><a href="<?php echo base_url(); ?>index/api" target="_blank">GET API</a></td>
            <td style="vertical-align: middle;"><a href="<?php echo base_url(); ?>Realtimeapi" target="_blank">Exchange USD to IDR / 3 minutes </a></td>
            <td style="vertical-align: middle;"><a href="<?php echo base_url(); ?>Changeapi" target="_blank">Microservice.</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>