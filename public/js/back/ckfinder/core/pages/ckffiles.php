<?php 
	session_start();

if($_SESSION['ckfiner_key'] ==''){
exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!--
 * CKFinder
 * ========
 * http://ckfinder.com
 * Copyright (C) 2007-2010, CKSource - Frederico Knabben. All rights reserved.
 *
 * The software, this file and its contents are subject to the CKFinder
 * License. Please read the license.txt file before using, installing, copying,
 * modifying or distribute this file or part of its contents. The contents of
 * this file is part of the Source Code of CKFinder.
-->
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:ckf="http://ns.ckfinder.com">
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
	<script type="text/javascript">var CKFConfig=window.parent.CKFConfig;var CKFLang=window.parent.CKFLang;document.write('<link href="'+CKFConfig.SkinPath+'fck_editor.css" type="text/css" rel="stylesheet" />');document.write('<link href="'+CKFConfig.SkinPath+'fck_dialog.css" type="text/css" rel="stylesheet" />');window.onload=function(){CKFLang.gK(document);document.getElementById('jY').action=window.parent.aK.mi;window.parent.d.gz(window);};function dq(){d.dq();d.fi();};function bB(){d.bB();d.fi();};function bA(){d.bA();d.fi();} </script>
	<link href="../css/ckfinder.css" type="text/css" rel="stylesheet" />
</head>
<body style="padding: 0px; margin: 0px; overflow: hidden">
	<table width="100%" cellpadding="0" cellspacing="0" style="height: 100%">
		<tr>
			<td id="nv" class="TB_ToolbarSet">
			</td>
		</tr>
		<tr id="fj" style="display: none">
			<td class="FCKUploadArea" style="white-space: normal">
				<div class="PopupTitle">
					<span ckf:lang="UploadTitle">Upload New File</span>
				</div>
				<div id="cY" style="padding: 15px; text-align: center">
					<table cellpadding="0" cellspacing="0" style="margin-left: auto; margin-right: auto">
						<tr>
							<td>
								<form id='jY' target="xFrmUploadWorker" method="post" enctype="multipart/form-data"
								style="margin: 0px;">
								<span ckf:lang="UploadSelectLbl">Select the file to upload</span><span id="ei"
									style="visibility: hidden"> <span ckf:lang="UploadProgressLbl">(Upload in progress,
										please wait...)</span></span><br />
								<input type="file" id="ja" name="NewFile" />
								</form>
							</td>
						</tr>
					</table>
					<script type="text/javascript">document.write('<iframe src="'+window.parent.bJ+'" id="xFrmUploadWorker" name="xFrmUploadWorker" width="1" height="1" frameborder="0" style="position:absolute;visibility:hidden;"></iframe>');</script>
				</div>
				<div class="PopupButtons">
					<div style="width: 100%">
						<table cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td width="100%">
									&nbsp;
								</td>
								<td nowrap="nowrap">
									<button id="fx" class="Button" onclick="ag.jX();">
										<span ckf:lang="UploadBtn">Upload Selected File</span></button>&nbsp;
									<button class="Button" onclick="ag.bK();">
										<span ckf:lang="CancelBtn">Cancel</span></button>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</td>
		</tr>
		<tr id="he" style="display: none">
			<td class="FCKSettingsArea">
				<div class="PopupTitle">
					<span ckf:lang="SetTitle">Settings</span>
				</div>
				<div style="padding: 10px; text-align: center">
					<table cellpadding="0" cellspacing="5" style="margin-left: auto; margin-right: auto">
						<tr>
							<td valign="top">
								<span ckf:lang="SetView">View:</span><br />
								<input id="xRdViewThumb" type="radio" name="qp" onclick="dq();" checked="checked" /><label
									for="xRdViewThumb" ckf:lang="SetViewThumb">Thumbnails</label><br />
								<input id="hD" type="radio" name="qp" onclick="dq();" /><label
									for="hD" ckf:lang="SetViewList">List</label><br />
							</td>
							<td valign="top">
								<span ckf:lang="SetDisplay">Display:</span><br />
								<input id="hx" type="checkbox" checked="checked" onclick="bB();" /><label
									for="hx" ckf:lang="SetDisplayName">File Name</label><br />
								<input id="hy" type="checkbox" onclick="bB();" /><label
									for="hy" ckf:lang="SetDisplayDate">Date</label><br />
								<input id="hv" type="checkbox" onclick="bB();" /><label
									for="hv" ckf:lang="SetDisplaySize">File Size</label><br />
							</td>
							<td valign="top">
								<span ckf:lang="SetSort">Sorting:</span><br />
								<input id="xChkSortName" type="radio" name="oO" onclick="bA();"
									checked="checked" /><label for="xChkSortName" ckf:lang="SetSortName">by File Name</label><br />
								<input id="hC" type="radio" name="oO" onclick="bA();" /><label
									for="hC" ckf:lang="SetSortDate">by Date</label><br />
								<input id="hB" type="radio" name="oO" onclick="bA();" /><label
									for="hB" ckf:lang="SetSortSize">by Size</label><br />
							</td>
						</tr>
					</table>
				</div>
				<div class="PopupButtons">
					<div style="width: 100%">
						<table cellpadding="0" cellspacing="0" width="100%">
							<tr>
								<td width="100%">
									&nbsp;
								</td>
								<td nowrap="nowrap">
									<button class="Button" onclick="bk.bK();">
										<span ckf:lang="CloseBtn">Close</span></button>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td id="qu" style="height: 100%">
			</td>
		</tr>
	</table>
</body>
</html>
