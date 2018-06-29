<title>Guess My Number (PHP)</title>
<h1>Guess My Number (PHP)</h1>
<?php
$b = $_POST['b'];
$x = $_POST['x'];
$out = $_POST['out'];
?>
<form action="gmn.php" method="post">
Guess My Number (1-100): <input type="text" name="number" size=3>
<br>
<input type="submit" value="Guess">
<?php
if ($b == 0) {
   $x = mt_rand(1,100);
   $out = "";
}
?>
<input type="hidden" name="b" value=<?php echo ++$b;?>>
<input type="hidden" name="x" value=<?php echo $x;?>>
<?php
if ($b > 1) {
   $a = $_POST['number'];
   if ($a != $x) $out .= ($a < $x) ? "Higher than $a.<br>" : "Lower than $a.<br>";
?>
<input type="hidden" name="out" value="<?php echo $out;?>">
</form>
<?php
   echo $out;
   if ($a == $x) {
      echo "$a is correct!  " . ($b-1) . " tries.";
   }
}
?>
<br><br>
<a href="gmn.php">Play Again</a>
