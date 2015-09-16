<?php
$testo=Testimonial::newInstance()->testimonialList();
$ct_url='oc-content/themes/nepcoders/admin/add-edit-testimonial.php';
?>
<a href='<?php echo osc_admin_render_theme_url($ct_url); ?>'>Add new testimonial</a>
<table class="table" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th class="col-status ">Title</th>
    	</tr>
    </thead>
    <tbody>
<?php
foreach ($testo as $test) {
	echo '<tr><td>'.$test['testimonial_title'].'</td>';
	echo "<td><a href='".osc_admin_render_theme_url($ct_url)."?nepcoders_action=edit&tid=".$test["pk_testimonial_id"]."'>Edit</a></td>";
	echo '</tr>';
}
?>
	</tbody>
</table>