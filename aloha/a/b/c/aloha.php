<html>
	<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Getting Started with Aloha Editor</title>
    <link rel="stylesheet" href="index.css" type="text/css">
    <!-- Load Aloha Editor css and js -->
    <link rel="stylesheet" href="../../css/aloha.css" type="text/css">
    <script src="../../lib/require.js"></script>
    <script src="../../lib/aloha.js"
      data-aloha-plugins="common/ui,common/format,common/link,common/highlighteditables "></script>
    <style>
    .aloha-editable-highlight {
    outline: #red solid 5px;
}
 
.aloha-editable-active, .aloha-editable-active[contenteditable=true]:focus {
    outline: #red solid 5px;
}</style>
</head>
<body>
    <div id="main">
        <div id="content"><p>Getting started with Aloha Editor!</p></div>
    </div>
    <script type="text/javascript">
        Aloha.ready( function() {
            Aloha.jQuery('#content').aloha();
	    var panel = Aloha.Sidebar.right.addPanel({
    // the id of your new Panel
    id: 'new-panel',
    // title to be set for your Panel
    title     : 'Sidebar Demo Panel',
    // initial html content of your panel
    content     : '<p>Demo content!</p>',
    // whether the panel should be expanded initially
    expanded : true
});
	    Aloha.settings.toolbar = {
    tabs: [
        {
            label: 'Format',
            components: [
                [ 'bold', 'italic', 'underline', '\n',
                  'subscript', 'superscript', 'strikethrough' ],
                [ 'formatBlock' ]
            ]
        },
        {
            label: 'Insert',
            exclusive: true,
            components: [
                "createTable", "characterPicker", "insertLink",
            ]
        },
        {
            label: 'Link',
            components: [ 'editlink' ]
        }
    ],
    exclude: [ 'strong', 'emphasis', 'strikethrough' ]
};
        });
    </script>
    
</body>
</html>