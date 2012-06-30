<div class="content-container typography">	
	<article>
		<h1>$Title</h1>
		<div class="content">
			<table>
			<tr>
			<th>Ticket #</th>
			<th>Summary</th>
			<th>Version</th>
			<th>Component</th>
			<th>Status</th>
			<th>Priortiy</th>				
			</tr>
			<% loop Tickets %>
			<tr>
			<td>$ID</td>
			<td>$Title</td>
			<td>$Version.Title</td>
			<td>$Component.Title</td>
			<td>$Status</td>
			<td>$Priority</td>
			</tr>
			<% end_loop %>
			</table>
		</div>
	</article>
		
		</div>
<% include SideBar %>