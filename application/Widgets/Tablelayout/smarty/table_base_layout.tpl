<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <title>{$title}</title>
    {block name=head}{** The head block **}{/block}
</head>
<body>
{if $has_head}
    {block name=header}{** The header block **}{/block}
    {block name=sidebar}{** The Sidebar Block **}{/block}
{/if}
{block name=body}{** The body block **}{/block}
{if $has_head}
    {block name=footer}{** The footer block **}{/block}
{/if}
</body>
<!--[if lte IE 8 ]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<![endif]-->
{block name=foot}{** The foot block **}{/block}
</html>