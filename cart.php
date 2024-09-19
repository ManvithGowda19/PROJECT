<?php
  session_start();

  // Include your database connection file
  require_once 'db.php';

  // Fetch cart items from the database
  $stmt = $conn->prepare('SELECT * FROM product');
  $stmt->execute();
  $result = $stmt->get_result();

  // Update quantity if form is submitted
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_qty'])) {
    $product_id = $_POST['product_id'];
    $new_qty = $_POST['new_qty'];

    // Update quantity in the database
    $update_stmt = $conn->prepare('UPDATE product SET qty = ? WHERE id = ?');
    $update_stmt->bind_param('ii', $new_qty, $product_id);
    if ($update_stmt->execute()) {
      echo json_encode(['status' => 'success', 'message' => 'Quantity updated successfully.']);
      exit;
    } else {
      echo json_encode(['status' => 'error', 'message' => 'Failed to update quantity.']);
      exit;
    }
  }

  
// Delete product from cart if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_product'])) {
  $product_id = $_POST['product_id'];

  // Delete product from the database
  $delete_stmt = $conn->prepare('DELETE FROM product WHERE id = ?');
  $delete_stmt->bind_param('i', $product_id);
  if ($delete_stmt->execute()) {
      echo json_encode(['status' => 'success', 'message' => 'Product deleted successfully.']);
      exit;
  } else {
      echo json_encode(['status' => 'error', 'message' => 'Failed to delete product.']);
      exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Cart</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <style>
    
  .logo img {
    height: 70px; /* Adjust as needed */
    width: 70px;
    border-radius: 50px;
  }

  
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="logo" href="index.php"><img src="images/logo.jpg" alt="logo"></a>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Products</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h4>Products in your cart!</h4>
    <table class="table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
          <th>Action</th> <!-- New column for delete button -->
        </tr>
      </thead>
      <tbody>
        <?php
          $grand_total = 0;
          while ($row = $result->fetch_assoc()):
            $total_price = $row['price'] * $row['qty'];
            $grand_total += $total_price;
        ?>
        <tr>
          <td><img src="<?= $row['image'] ?>" alt="Product Image" style="width: 100px;"></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['price'] ?></td>
          <td>
            <input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width: 75px;">
            <button class="btn btn-sm btn-primary updateQty" data-product-id="<?= $row['id'] ?>">Update</button>
          </td>
          <td><?= $total_price ?></td>
          <td>
            <button class="btn btn-sm btn-danger deleteProduct" data-product-id="<?= $row['id'] ?>">Delete</button>
          </td>
        </tr>
        <?php endwhile; ?>
        <tr>
          <td colspan="4"></td>
          <td><b>Total: <?= $grand_total ?></b></td>
        </tr>
      </tbody>
    </table>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script>
    $(document).ready(function() {
      $('.updateQty').click(function() {
        var productId = $(this).data('product-id');
        var newQty = $(this).closest('tr').find('.itemQty').val();

        $.ajax({
          url: 'cart.php',
          method: 'post',
          dataType: 'json',
          data: {
            update_qty: 1,
            product_id: productId,
            new_qty: newQty
          },
          success: function(response) {
            if (response.status === 'success') {
              // Update success message or handle success case
              alert(response.message);
              setTimeout(function() {
              location.reload();
              }, 1000);
            } else {
              // Handle error case
              alert(response.message);
            }
          },
          error: function(xhr, status, error) {
            // Handle error case
            console.error(xhr.responseText);
          }
        });
      });
    });

    $(document).ready(function() {
  $('.deleteProduct').click(function() {
    var productId = $(this).data('product-id');
    var row = $(this).closest('tr'); // Store the row for removal after successful delete

    $.ajax({
      url: 'cart.php',
      method: 'post',
      dataType: 'json',
      data: {
        delete_product: 1,
        product_id: productId
      },
      success: function(response) {
        if (response.status === 'success') {
          // Remove the deleted product row from the table
          row.remove();
          // Update success message or handle success case
          alert(response.message);
          // Reload the page after a short delay
          setTimeout(function() {
            location.reload();
          }, 1000); // 1000 milliseconds = 1 second
        } else {
          // Handle error case
          alert(response.message);
        }
      },
      error: function(xhr, status, error) {
        // Handle error case
        console.error(xhr.responseText);
      }
    });
  });
});

 </script>
</body>

</html>
