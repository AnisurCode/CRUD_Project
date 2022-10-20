<?php
  session_start();
  require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD</title>
    <style>
        .title{
            text-align: center;
        }
        .title1{
            color: white;
        }
        .title2{
            color: white;
        }
        table{
            text-align:center;
        }
        body{
            background-color: darkgrey;
        }
    </style>
  </head>
  <body>
    <div class="title">
      <h1 class="title1">My Crud Project</h1>
      <h3 class="title2">19CSE046</h3>
    </div>
    <div class="container mt-4">

    <?php include('text.php'); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Product Details
                <a href="create.php" class="btn btn-primary float-end">Add Product</a>
              </h4>
            </div>
            <div class="card-body">
              <table class="table table-striped table-dark">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Product_name</th>
                    <th>Product_description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Expire_date</th>
                    <th>Operation</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = "SELECT * FROM product";
                      $query_run = mysqli_query($con, $query);

                      if(mysqli_num_rows($query_run)>0)
                      {
                        foreach($query_run as $product)
                        {
                          ?>
                          <tr>
                            <td><?= $product['id']; ?></td>
                            <td><?= $product['name']; ?></td>
                            <td><?= $product['description']; ?></td>
                            <td><?= $product['quantity']; ?></td>
                            <td><?= $product['price']; ?></td>
                            <td><?= $product['expire_date']; ?></td>
                            <td>
                              <a href="product_update.php?id=<?= $product['id']; ?>" class="btn btn-light">Update</a>
                              <form action="operation.php" method="POST" class="d-inline">
                                  <button type="submit" name="delete_product" value="<?= $product['id'];?>" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                      else
                      {
                        echo "<h5> No record found! </h5>";
                      }
                    ?>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  
   

  </body>
</html>