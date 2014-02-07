<html>
<script>
function initialize() {
                // Test to see if we support the Storage API
                var SupportsLocal = (('localStorage' in window) && window['localStorage'] !== null);
                var SupportsSession = (('sessionStorage' in window) && window['sessionStorage'] !== null);

                // if either one is not supported, then bail on the demo
                if (!SupportsLocal || !SupportsSession) {
                    document.getElementById('infoform').innerHTML = "<p>Sorry, this browser does not support the W3C Storage API.</p>";
                    return;
                }
                // if the localStorage object has some content, restore it
                if (window.localStorage.length != 0) {
                    for(i=0;i<window.localStorage.length;i++){

                                getLocalContent(window.localStorage.key(i));


                    }
                }
 }
 function storeLocalContent(elementId,value){
    window.localStorage.setItem(elementId,value);

 }
 function getLocalContent(elementId){
     document.getElementById(elementId).value = window.localStorage.getItem(elementId);
 }

 window.onload = function(){
     initialize();
 }
</script>
<form id="suspendedProperties">
    <p><h4>Select Station:
    <select name="stationDropdown" id="stationDropdown" onChange="storeLocalContent('stationDropdown',this.value)" >
        <option value="50028000">Tanama River</option>
        <option value="50010500">Rio Guajataca, Lares</option>
        <option value="60008002">Example River2</option>
        <option value="60008003">Example River3</option>
        <option value="60008004">Example River4</option>
     </select>
     </h4></p>

    <p>Select Sample Medium:
        <select name="sampleMediumDropdown" id="sampleMediumDropdown"  onChange="storeLocalContent('sampleMediumDropdown',this.value)">
          <option value="WS">WS(Surface Water)</option>
          <option value="WSQ">WSQ(Surface Water QC)</option>
        </select>
        </p>
    <p>Begin Date
        <input type="date" />
     </p>
     <p>Hydrologic Event: <select name="hydroEvent" id="hydroEvent" onChange="storeLocalContent('hydroEvent',this.value)" >
                            <option value="4">4- stable, low stage</option>
                            <option value="5">5- falling stage</option>
                            <option value="6">6- stable, high stage</option>
                            <option value="7">7- peakstage</option>
                            <option value="8">8- rising state</option>
                            <option value="9" selected>9- stable, normal stage</option>
                            <option value="A">A- Not Determined</option>
                            <option value="X">X- Not applicable</option>  
                          </select>
</p>
<p>Add:<input type="number" size="" id="containerCuantity" onChange="storeLocalContent('containerCuantity',this.value)"/> <select id="singleMultiContainer"                             name="singleMultiContainer" onChange="storeLocalContent('singleMultiContainer',this.value)">
                                        <option value="single">Single container sample</option>
                                        <option value="multi">Multiple sets container</option>
                                       </select>
</p>
 <p>Analyses Requested:(Applies to all samples)<br/></p>
 <div id="analyses" >
 <table align="center" cellpadding="10px">
 <tr>
 <td align="left"><input type="checkbox" name="analysis" value="C"> Concentration</input></td>  
 <td align="left"><input type="checkbox" name="analysis" value="SF"> Sand-fine break**</input></td> 
 </tr>
 <tr>
 <td align="left"><input type="checkbox" name="analysis" value="SA"> Sand analysis**</input></td>
 <td align="left"><input type="checkbox" name="analysis" value="T"> Turbidity</input>   </td>
 </tr>
 <tr>
 <td align="left"><input type="checkbox" name="analysis" value="LOI"> Loss-on-ignition**</input></td>
 <td align="left"><input type="checkbox" name="analysis" value="DS"> Dissolve solids</input></td>
 </tr>
 <tr>
 <td align="left"><input type="checkbox" name="analysis" value="SC"> Specific conductance</input></td>                                      
 <td align="left"><input type="checkbox" name="analysis" value="Z"> Full-size fractions**</input></td>
 </tr>
 </table>
 </div>
<input type="button" value="Main Menu" onClick="window.location='SED_WE.html'"/>
<input id="nextButton" type="button" value="Add Sample info." onDblClick="getLocalContent(C)"/>

</form>
</html>