<?php 
$email ='careers-team@nottingham.ac.uk';
echo <<<footerHTML
<p><strong style="background-color: yellow;">PLEASE NOTE:</strong> There were significant changes to the survey questions in the year 2011/12. As such, comparisons of 2011/12 data with that of previous years cannot accurately be made.</p>
<div id="footer">
<p>$address<br/>Tel: $telephone&nbsp;&nbsp;&nbsp; Email: <a class="footer" href="mailto:$email?Subject=GEMS%20Information">$email</a></p>
<ul style="list-style:none; margin-top:5px; margin-left:0px; padding-left:0px;">
<li style="display:inline;margin-right:2px; margin-left:0px; border-right:1px solid #535353;">
<a href="http://www.nottingham.ac.uk/utilities/copyright.aspx" title="Copyright" style="color: #535353; text-decoration: none;">Copyright</a>
</li>
<li style="display:inline;margin-right:2px; margin-left:2px; border-right:1px solid #535353;">
<a href="http://www.nottingham.ac.uk/utilities/terms.aspx" title="Terms and Conditions" style="color: #535353; text-decoration: none;">Terms & Conditions</a>
</li>
<li style="display:inline;margin-right:2px; margin-left:2px; border-right:1px solid #535353;">
<a href="http://www.nottingham.ac.uk/utilities/privacy.aspx" title="Privacy" style="color: #535353; text-decoration: none;">Privacy</a>
</li>
<li style="display:inline;margin-right:2px; margin-left:2px; border-right:1px solid #535353;">
<a href="http://www.nottingham.ac.uk/utilities/accessibility/accessibility.aspx" title="Accessibility" style="color: #535353; text-decoration: none;">Accessibility</a>
</li>
<li style="display:inline;margin-right:2px; margin-left:2px;">
<a href="http://www.nottingham.ac.uk/freedom-of-information/" title="Freedom of Information" style="color: #535353; text-decoration: none;">Freedom of Information</a>
</li>
</ul>
</div>
</div><!-- end footer -->
</div><!-- end rootcontainer -->
footerHTML;

?>