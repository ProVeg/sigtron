<h1>SigTron 3000™</h1>
<noscript>Turn on JavaScript!</noscript>
<script>
function download(filename, text) {
  var element = document.createElement('a');
  element.setAttribute('href', 'data:text/html;charset=utf-8,' + encodeURIComponent(text));
  element.setAttribute('download', filename);

  element.style.display = 'none';
  document.body.appendChild(element);

  element.click();

  document.body.removeChild(element);
}
</script>
<p><?php 
  if(!isset($_COOKIE["sigtron"])) {
    echo "No cookie! If you filled in this form in the last year, check your cookie settings!";
  } else {
    $values = explode("###", $_COOKIE["sigtron"]); 
    echo "Loaded values from cookie!";
  }
?></p>
<form action="generate.php" method="post" target="preview">
  <table>
    <tr><th>Template:</th><td><select onchange="this.form.submit()" name="template"><?php
      foreach (glob("*.template") as $file) {
        echo "<option";
        if (substr($file, 0, -9) === $values[0]) {
          echo " selected='selected'";
        }
        echo ">" . substr($file, 0, -9) . "</option>";
      }
    ?></select></td></tr>
    <tr><th>Name:</th><td><input onchange="this.form.submit()" type="text" name="name" value="<?php echo $values[1]; ?>"></td></tr>
    <tr><th>Job title:</th><td><input onchange="this.form.submit()" type="text" name="title" value="<?php echo $values[2]; ?>"></td></tr>
    <tr><th>Phone:</th><td><input onchange="this.form.submit()" type="text" name="phone" value="<?php echo $values[3] ? $values[3] : "+49 30 2902825 331"; ?>"> (replace extension or whole number! Example: +49 30 2902825 331)</td></tr>
    <tr><th>Additional text:</th><td><input onchange="this.form.submit()" type="text" name="additional" value="<?php echo $values[4]; ?>"> (fax, mobile, GPG fingerprint, …) (Need a line break? Use <code>&lt;br /&gt;</code>)</td></tr>
    <tr><th>Preview:</th><td><input type="submit" value="Preview"><br /><iframe width="700" height="450" name="preview"></iframe><br />Make sure the signature is correct, then:</td></tr>
    <tr><th>Download:</th><td>Click <a href="javascript:download('Signature created by SigTron 3000.html', window.frames[0].document.body.innerHTML);">here</a>, then save to a local file and use it in your email client as HTML signature</td></tr>
  </table>
</form>
<p>If you need a special template for you unit, contact Eileen.<br />
For support with the software, contact Simon.<br />
<a href="https://github.com/ProVeg/sigtron">SigTron 3000™ on Github</a></p>