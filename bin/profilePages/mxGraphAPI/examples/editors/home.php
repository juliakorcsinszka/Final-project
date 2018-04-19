<?php

  session_start();

  if (isset($_SESSION['userID'])) {

  }else{
      header("Location: ../../../../index.php");
  }

?>

<! DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"> <!--why?-->

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--fa-caret character-->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" /><!--character set used-->
    <link rel="stylesheet" type="text/css" href="../../../../css/style.css"/>
    <meta name="description" content="Home page for the ER diagram collaboration site" />
    <meta name="author" content="Julia Korcsinszka" />
    <script type="text/javascript">
    //base path for to acess other files
    var mxBasePath = '../../src';
    </script>
    <script type="text/javascript" src="../../src/js/mxClient.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <title>ER docs</title>

</head>


<body onload="createEditor('config/diagrameditor.xml');">

    <div class="page">
              <div class="header">
                <div class="dropDown">
                  <p class="dropbtn">  <?php echo $_SESSION['userName']; ?> &emsp;<i class="fa fa-caret-down"></i> </p>
                    <div class="dropDownContent">
                      <a href="#about">Invitations </a>
                      <a href="../../../../includes/dblogout.php">
                        <input method="POST" name="submit" type="submit" value="Log out "></input>
                      </a>
                    </div>    
                </div>
                <img src="../../../../css/images/user-icon.png" style="float:right" class="logo" alt="User">  
                <a href="../index.php"> 
                  <img src="../../../../css/images/logo.png" class="logo" alt="Logo">
                </a>
              </div>


              <div class="body">


                <script type="text/javascript">
                // Program starts here. The document.onLoad executes the
                // createEditor function with a given configuration.
                // In the config file, the mxEditor.onInit method is
                // overridden to invoke this global function as the
                // last step in the editor constructor.
                function onInit(editor) {
                  // Enables rotation handle
                  mxVertexHandler.prototype.rotationEnabled = true;
                  
                  
                  // Defines an icon for creating new connections in the connection handler.
                  // This will automatically disable the highlighting of the source vertex.
                  mxConnectionHandler.prototype.connectImage = new mxImage('images/connector.gif', 16, 16);
                  
                  // Enables connections in the graph and disables
                  // reset of zoom and translate on root change
                  // (ie. switch between XML and graphical mode). [REMOVED]
                

                  // Clones the source if new connection has no target [REMOVED]
                

                  // Updates the title if the root changes [REMOVED]
                  
                  
                    // Changes the zoom on mouseWheel events [REMOVED]
                    

                  // Defines a new action to switch between
                  // XML and graphical display
                  var textNode = document.getElementById('xml');
                  var graphNode = editor.graph.container;
                  //to display the source code
                  var sourceInput = document.getElementById('source');
                  sourceInput.checked = false;

                  var funct = function(editor)
                  {
                    if (sourceInput.checked)
                    {
                      graphNode.style.display = 'none';
                      textNode.style.display = 'inline';
                      
                      var enc = new mxCodec();
                      var node = enc.encode(editor.graph.getModel());
                      
                      textNode.value = mxUtils.getPrettyXml(node);
                      textNode.originalValue = textNode.value;
                      textNode.focus();
                    }
                    else
                    {
                      graphNode.style.display = '';
                      
                      if (textNode.value != textNode.originalValue)
                      {
                        var doc = mxUtils.parseXml(textNode.value);
                        var dec = new mxCodec(doc);
                        dec.decode(doc.documentElement, editor.graph.getModel());
                      }

                      textNode.originalValue = null;
                      
                      // Makes sure nothing is selected in IE
                      if (mxClient.IS_IE)
                      {
                        mxUtils.clearSelection();
                      }

                      textNode.style.display = 'none';

                      // Moves the focus back to the graph
                      editor.graph.container.focus();
                    }
                  };
                  
                  editor.addAction('switchView', funct);


                  
                  // Defines a new action to switch between
                  // XML and graphical display
                  mxEvent.addListener(sourceInput, 'click', function()
                  {
                    editor.execute('switchView');
                  });

                  // Create select actions in page
                  var node = document.getElementById('mainActions');
                  var buttons = ['delete', 'undo', 'redo', 'print',];
                  
                  // Only adds image and SVG export if backend is available
                  if (editor.urlImage != null)
                  {
                    // Client-side code for image export
                    var exportImage = function(editor)
                    {
                      //scaling the graph
                      var graph = editor.graph;
                      var scale = graph.view.scale;
                      var bounds = graph.getGraphBounds();
                      
                          
                      
                        //Renders graph. Offset will be multiplied with state's scale when painting state.
                      var xmlCanvas = new mxXmlCanvas2D(root);
                      xmlCanvas.translate(Math.floor(1 / scale - bounds.x), Math.floor(1 / scale - bounds.y));
                      xmlCanvas.scale(scale);
                      
                      var imgExport = new mxImageExport();
                        imgExport.drawState(graph.getView().getState(graph.model.root), xmlCanvas);
                        
                      // Puts request data together
                      var w = Math.ceil(bounds.width * scale + 2);
                      var h = Math.ceil(bounds.height * scale + 2);
                      var xml = mxUtils.getXml(root);
                      
                      // Requests image if request is valid
                      if (w > 0 && h > 0)
                      {
                        var name = 'export.png';
                        var format = 'png';
                        var bg = '&bg=#FFFFFF';
                        
                        new mxXmlRequest(editor.urlImage, 'filename=' + name + '&format=' + format +
                              bg + '&w=' + w + '&h=' + h + '&xml=' + encodeURIComponent(xml)).
                              simulate(document, '_blank');
                      }
                    };
                    
                    editor.addAction('exportImage', exportImage);
                    
                    // Client-side code for SVG export
                    var exportSvg = function(editor)
                    {
                      var graph = editor.graph;
                      var scale = graph.view.scale;
                      var bounds = graph.getGraphBounds();

                        // Prepares SVG document that holds the output
                        var svgDoc = mxUtils.createXmlDocument();
                        var root = (svgDoc.createElementNS != null) ?
                          svgDoc.createElementNS(mxConstants.NS_SVG, 'svg') : svgDoc.createElement('svg');
                        
                      if (root.style != null)
                      {
                        root.style.backgroundColor = '#FFFFFF';
                      }
                      else
                      {
                        root.setAttribute('style', 'background-color:#FFFFFF');
                      }
                        
                        if (svgDoc.createElementNS == null)
                        {
                          root.setAttribute('xmlns', mxConstants.NS_SVG);
                        }
                        
                        root.setAttribute('width', Math.ceil(bounds.width * scale + 2) + 'px'); //bounds of the graph
                        root.setAttribute('height', Math.ceil(bounds.height * scale + 2) + 'px');
                        root.setAttribute('xmlns:xlink', mxConstants.NS_XLINK);
                        root.setAttribute('version', '1.1');
                        
                        // Adds group for anti-aliasing via transform
                        var group = (svgDoc.createElementNS != null) ?
                            svgDoc.createElementNS(mxConstants.NS_SVG, 'g') : svgDoc.createElement('g');
                      group.setAttribute('transform', 'translate(0.5,0.5)');
                      root.appendChild(group);
                        svgDoc.appendChild(root);

                        // Renders graph. Offset will be multiplied with state's scale when painting state.
                        var svgCanvas = new mxSvgCanvas2D(group);
                        svgCanvas.translate(Math.floor(1 / scale - bounds.x), Math.floor(1 / scale - bounds.y));
                        svgCanvas.scale(scale);
                        
                        var imgExport = new mxImageExport();
                        imgExport.drawState(graph.getView().getState(graph.model.root), svgCanvas);

                      var name = 'export.svg';
                        var xml = encodeURIComponent(mxUtils.getXml(root));
                      
                      new mxXmlRequest(editor.urlEcho, 'filename=' + name + '&format=svg' + '&xml=' + xml).simulate(document, "_blank");
                    };
                    
                    editor.addAction('exportSvg', exportSvg);
                    
                    buttons.push('exportImage');
                    buttons.push('exportSvg');
                  };
                  
                  //set buttons
                  for (var i = 0; i < buttons.length; i++)
                  {
                    var button = document.createElement('button');
                    mxUtils.write(button, mxResources.get(buttons[i]));
                  
                    var factory = function(name)
                    {
                      return function()
                      {
                        editor.execute(name);
                      };
                    };
                  
                    mxEvent.addListener(button, 'click', factory(buttons[i]));
                    node.appendChild(button);
                  }

                  // Create select actions in page [REMOVED]


                  // Create select actions in page
                  var node = document.getElementById('zoomActions');
                  mxUtils.write(node, 'Zoom: ');
                  mxUtils.linkAction(node, 'In', editor, 'zoomIn');
                  mxUtils.write(node, ', ');
                  mxUtils.linkAction(node, 'Out', editor, 'zoomOut');
                  mxUtils.write(node, ', ');
                  mxUtils.linkAction(node, 'Actual', editor, 'actualSize');
                }

                window.onbeforeunload = function() { return mxResources.get('changesLost'); };
              </script>


      
              <div id="page" style="float:left;">
                <div id="mainActions"
                  style="width:100%;padding-top:8px;padding-left:0;padding-bottom:8px;">
                </div>
                <div id="selectActions" style="width:100%;padding-left:54px;padding-bottom:4px;">
                </div>
                <table border="0" width="730px">
                  <tr>
                    <td id="toolbar" style="background-color: white; height:480px; width:16px;padding-left:0; float:left;" valign="top">
                      <!-- Toolbar Here -->       
                    </td>
                    <td valign="top" style="float:left; border-width:1px;border-style:solid;border-color:black;">
                      <div id="graph" tabindex="-1" style="position:relative;height:480px;width:705px;overflow:hidden;cursor:default; background-color: white">
                        <!-- Graph Here -->
                        <center id="splash" style="padding-top:230px;">
                          <img src="images/loading.gif">
                        </center>
                      </div>
                      <textarea id="xml" style="height:480px;width:30px;display:none;border-style:none;"></textarea>
                    </td>
                  </tr>
                </table>
                <span style="float:right;padding-right:36px; z-index: -1;">
                  <input id="source" type="checkbox"/> Show Source
                </span>
                <div id="zoomActions" style="background-color: white; text-decoration: none; font-family: 'Roboto'; font-size: 12pt; color: blue; width:92%;padding-left:54px;padding-top:4px; padding-bottom: 10px; ">
                </div>
                
              </div> <!-- project page div-->

              </div> <!--body div-->

              <div class="footer">
                <p>Julia Korcsinszka 2018 <br/> University of Liverpool, Department of Computer Science</p>
              </div>
            </div>
<!--             //';
  //   }else{
  //     //redirect to login page
  //     header("Location: ../../../../pages/login.php");
  //   }
  // ?> -->

  
     

</body>