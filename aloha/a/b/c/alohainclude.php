 <!-- it is used to include the aloha configuration files -->



 <meta name="description" content="impress.js is a presentation tool based on the power of CSS3 transforms and transitions in modern browsers and inspired by the idea behind prezi.com. It's using Aloha Editor to make the content inline editable.">
    <meta name="author" content="Bartek Szopka" />

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:regular,semibold,italic,italicsemibold|PT+Sans:400,700,400italic,700italic|PT+Serif:400,700,400italic,700italic" rel="stylesheet" />

    <link rel="stylesheet" href="../../css/aloha.css" type="text/css">
	<!-- add aloha -->
	<script src="js/aloha-config.js"></script>
	<script src="../../lib/require.js"></script>
	<script src="../../lib/vendor/jquery-1.7.2.js"></script>
    <script>
	  // Passing jQuery into Aloha explicitly is not necessary since
	  // newer versions of jQuery will make a call to define which will
	  // be picked up in aloha.js
	  //Aloha.settings.jQuery = $.noConflict(true);
    </script>
	<!--
		Load the Aloha Editor library.
		The plugin list could also be added to the configuration.
	-->
	<!-- Don't commit the sourceview plugin to the list of enabled plugins! -->
	<script src="../../lib/aloha.js"
	        data-aloha-plugins="common/ui,
	                            common/format,
	                            common/table,
	                            common/list,
	                            common/link,
	                            common/highlighteditables,
	                            common/undo,
	                            common/contenthandler,
	                            common/paste,
	                            common/characterpicker,
	                            common/commands,
	                            common/block,
	                            common/image,
	                            common/abbr,
	                            common/horizontalruler,
	                            common/align,
	                            common/dom-to-xhtml,
	                            community/colorselector,
	                            extra/formatlesspaste,
	                            extra/hints,
	                            extra/toc,
	                            extra/headerids,
	                            extra/listenforcer,
	                            extra/metaview,
	                            extra/numerated-headers,
	                            extra/ribbon,
	                            extra/wai-lang,
	                            extra/flag-icons,
	                            extra/linkbrowser,
	                            extra/imagebrowser,
	                            extra/cite"></script>
	<!-- Include the fake-jquery to make sure that Aloha works even if
		 the user includes his own global jQuery after aloha.js. -->
	<script src="fake-jquery.js"></script>
    