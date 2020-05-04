<?php $this->load->view('admin/popup_header'); ?>
	<table width="100%"  border="0" cellspacing="5" cellpadding="5" class="list">
		 <thead>
		 <tr >
			<td width="15%"  height="30"><?php echo $heading_title; ?></td>
		</tr>
		 </thead>
		
		<tr class="trEven">
			<td height="40"><strong>Name  :</strong> <?php echo $pageresult->name;?> </td>
		</tr>
        <tr class="trEven">
			<td height="40"><strong>Email  :</strong> <?php echo $pageresult->email;?> </td>
		</tr>
        <tr class="trEven">
			<td height="40"><strong>Post Date  :</strong> <?php echo getdateformat($pageresult->recv_date,2);?> </td>
		</tr>
		<tr class="trEven">
			<td height="40"><strong>Comments : </strong> <?php echo $pageresult->comments;?> </td>
		</tr>
	</table>
</body>
</html>