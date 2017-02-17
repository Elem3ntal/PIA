var download = function(content, fileName, mimeType) {
   var a = document.createElement('a');
   mimeType = mimeType || 'application/octet-stream';

   if (navigator.msSaveBlob) { // IE10
      return navigator.msSaveBlob(new Blob([content], { type: mimeType }), fileName);
   } else if ('download' in a) { //html5 A[download]
      a.href = 'data:' + mimeType + ',' + encodeURIComponent(content);
      a.setAttribute('download', fileName);
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      return true;
   } else { //do iframe dataURL download (old ch+FF):
      var f = document.createElement('iframe');
      document.body.appendChild(f);
      f.src = 'data:' + mimeType + ',' + encodeURIComponent(content);

      setTimeout(function() {
         document.body.removeChild(f);
      }, 333);
      return true;
   }
}
function csv(){
   var oTable = document.getElementById('tableShow');
   var dataTable=[];
   //gets rows of table
   var rowLength = oTable.rows.length;

   //loops through rows
   for (i = 0; i < rowLength; i++){
      dataTable[i]=[];
      //gets cells of current row
      var oCells = oTable.rows.item(i).cells;

      //gets amount of cells of current row
      var cellLength = oCells.length;

      //loops through each cell in current row
      for(var j = 0; j < cellLength; j++){

         // get your cell info here

         var cellVal = oCells.item(j).innerHTML;
         console.log(cellVal);
         dataTable[i][j]=cellVal;
      }
   }
   var csvContent = '';
   dataTable.forEach(function (infoArray, index) {
      dataString = infoArray.join(';');
      csvContent += index < dataTable.length ? dataString + '\n' : dataString;
   });
   download(csvContent, 'Inventario.csv', 'text/csv');
}
