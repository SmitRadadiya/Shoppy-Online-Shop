<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shoppy</title>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    		function hideURLbar(){ window.scrollTo(0,1); } </script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="css/bootstrap1.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
    <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <style>
    .switch {
        position: relative;
        display: inline-block;
        width: 70px;
        height: 34px;
      }
      .switch input {
        opacity: 0;
        width: 0;
        height: 0;
      }
      .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
      }
      .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
      }
      input:checked + .slider {
        background-color: #34C268;
      }
      input:checked + .slider:before {
        -webkit-transform: translateX(36px);
        -ms-transform: translateX(36px);
        transform: translateX(36px);
      }
      .slider.round {
        border-radius: 34px;
      }
      .slider.round:before {
        border-radius: 50%;
      }
      </style>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <?php include 'navigationbar.php' ?><br>
      <div class="privacy about">
        <h3>Items</h3>
        <div class="col-md-4 col-sm-6 col-xs-12">
          <a class="">
          <div align="left" margin="10px" height="33.33%">
            <div class="content-box-image" style="height:50px" align="right">
              <div class="container">
                <button type="button">
                <span class="glyphicon glyphicon-edit"></span> Edit</button>
              </div>
            </div>
          </div>
        </div>
          <div class="checkout-right">
          <table class="timetable_sub" style="border-collapse:collapse">
            <thead>
              <tr>
                <th>SL No.</th>
                <th>Product</th>
                <th>Discription</th>
              </tr>
            </thead>
            <tbody><tr class="rem1">
              <td class="invert">1</td>
              <td class="invert-image"><img src="1.png" alt=" " class="img-responsive"></a></td>
              <td class="invert">
                <label class="switch">
                  <input type="checkbox">
                  <span class="slider round"></span>
                </label><br><br>
              <br>Fortune Sunflower Oil<br><br><br>
              $290.00</td>
            </tr>
          </tbody>
          <tbody><tr class="rem1">
            <td class="invert">1</td>
            <td class="invert-image"><img src="2.png" alt=" " class="img-responsive"></a></td>
            <td class="invert">
              <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
              </label><br><br>
            <br>Coca-cola<br><br><br>
            $40.00</td>
          </tr>
        </tbody>
        </table>
        </div>
      </div>
    </main>
  </body>
</html>
