<?php 
    $email = $title = $ingredients = '';
    $errors = array('email'=> '','title'=> '', 'ingredients'=>'');

    if(isset($_POST['submit'])){
        if(empty($_POST['email'])){
            $errors['email'] = 'An Email is required <br />';
        }else{
            //echo htmlspecialchars($_POST['email']);
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'email must be a valid email address';
            }
        }
        if(empty($_POST['title'])){
            $errors['title'] = 'A title is required <br />';
        }else{
            //echo htmlspecialchars($_POST['title']);
            $title = $_POST['title'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
            $errors['title'] = 'Title must be letters';
            }
        }
        if(empty($_POST['ingredients'])){
            $errors['ingredients'] = 'Atleast one ingredient is required  <br />';
        }else{
            //echo htmlspecialchars($_POST['ingredients']);
            $ingredients = $_POST['ingredients'];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
            $errors['ingredients'] = 'ingredient must be comma separated';
            }
        }
        if(array_filter($errors)){
            //echo 'errors in form';
        }else{
            //echo 'form is valid';
            header('location: index.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <?php include('templates/header.php') ?>
    <section class="container">
        <form action="add.php" method="POST">
            <h4>ADD PIZZA</h4>
            <div>
                <label>Your Email:</label>
                <div class="errortext" style = "color: red;"><?php echo $errors['email']?></div>
                <input type="text" name="email" value="<?php echo htmlspecialchars($email);?>">
            </div>
            <div>
                <label>Pizza Title:</label>
                <div class="errortext" style = "color: red;"><?php echo $errors ['title'] ?></div>
                <input type="text" name="title" value="<?php echo htmlspecialchars($title); ?>">
            </div>
            <div>
                <label>Ingredients:</label>
                <div class="errortext" style = "color: red;"><?php echo $errors['ingredients'] ?></div>
                <input type="text" name="ingredients" value ="<?php echo htmlspecialchars($ingredients);?>">
            </div>
            <div>
                <button type="submit" class="sub-btn" name="submit" value="submit">Submit</button>
            </div>
        </form>
    </section>
    <?php include('templates/footer.php') ?>
</html>