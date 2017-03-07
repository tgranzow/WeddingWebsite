<html>
    <head>
        <title>PHP Info</title>
    </head>
    <body>
        <h1>Test</h1>
        <table>
        	<tbody>
        		<tr>
        			<td>
        				IP Address:
        			</td>
        			<td>
        				<?php echo $_SERVER["REMOTE_ADDR"]; ?>
        			</td>
        		</tr>
        		<tr>
        			<td>
        				Browser:
        			</td>
        			<td>
        				<?php echo $_SERVER["HTTP_USER_AGENT"]; ?>
        			</td>
        		</tr>
        	</tbody>
        </table>
    </body>
</html>
