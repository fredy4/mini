<!DOCTYPE html>
<html>
<head>
<title>MSI</title>
</head>
<body>
<form action="productco.php" method="post">
<h1>Add your Products</h1>
	<p>
            <label for="id" > Product's Code</label>
            <input id="id" name="id" required="required" type="text" placeholder="eg: frdg"/>
        </p>
        <p> 
            <label for="name" > Product Name </label>
            <input id="name" name="name" required="required" type="text" placeholder="eg:Fridge" /> 
        </p>
        <p> 
            <label for="type"> Product Type </label>
			<select name="type">
			<option>Select type</option>
			<option>Electronics </option>
			<option>Electrical </option>
			
			</select>
			  </p>
		<p> 
            <label for="company" > Company Name </label>
            <input id="company" name="company" required="required" type="text" placeholder="eg:Whirlpool" /> 
        </p>
        <p>
            <label for="no" > Quantity </label>
            <input id="no" name="no" required="required" type="text" placeholder="eg:5" /> 
           </p>
           <p> 
            <label for="cost" > Cost (Rs.)</label>
            <input id="cost" name="cost" required="required" type="text" placeholder="eg:1230" /> 
            </p>
            <p class="send button"> 
            <input type="submit" name="submit" value="Add" /> 
        </p>

        </form>
         </body>
</html>
