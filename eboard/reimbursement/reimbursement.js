var rowCounts = {
   event_budget: 1,
   payees: 1,
   scans: 1
};

var $rowCountObjs = {
   event_budget: $("[name=event_budget_row_count]"),
   payees: $("[name=payees_row_count]"),
   scans: $("[name=scans_row_count]")
}

var currentRows = {
   event_budget: $(".event_budget_row"),
   payees: $(".payees_row"),
   scans: $(".scan_row")
};

$("body").on("click", ".addRow-button", function()
{
   var rowType = $(this).closest("tr").attr("class");
   var table = $(this).closest("table").attr("id");
   addRow(rowType, table);
});

function addRow(rowType, table)
{
   var $row;

   switch (rowType)
   {
      case "event_budget_row":
      {
         // Increment row count
         rowCounts.event_budget++;

         // Remove add button from previous row
         currentRows.event_budget.find(".addRow-button").remove();

         var html = '<tr class="event_budget_row"> \
                        <td> \
                           <input type="text" name="budget_charge_'+ rowCounts.event_budget +'" size="30"/> \
                        </td> \
                        <td> \
                           $ <input type="text" name="budget_price_'+ rowCounts.event_budget +'" size="10"/> \
                        </td> \
                        <td> \
                           <input type="text" name="budget_reason_'+ rowCounts.event_budget +'" size="45"/> \
                        </td> \
                        <td> \
                           <div class="addRow-button"></div> \
                        </td> \
                     </tr>';
         $row = $(html);
         currentRows.event_budget = $row;

         $rowCountObjs.event_budget.val(rowCounts.event_budget);
         break;
      }
      case "payees_row":
      {
         // Increment row count
         rowCounts.payees++;

         // Remove add button from previous row
         currentRows.payees.find(".addRow-button").remove();

         var html = '<tr class="payees_row"> \
                        <td> \
                           <input type="text" name="payees_item_'+ rowCounts.payees +'" size="25"/> \
                        </td> \
                        <td> \
                           $ <input type="text" name="payees_price_'+ rowCounts.payees +'" size="5"/> \
                        </td> \
                        <td> \
                           <input type="text" name="payees_list_' + rowCounts.payees + '" size="15"/> \
                        </td> \
                        <td> \
                           <input type="text" name="payees_reason_'+ rowCounts.payees +'" size="30"/> \
                        </td> \
                        <td> \
                           <div class="addRow-button"></div> \
                        </td> \
                     </tr>';
         $row = $(html);
         currentRows.payees = $row;

         $rowCountObjs.payees.val(rowCounts.payees);
         break;
      }
      case "scan_row":
      {
         // Increment row count
         rowCounts.scans++;

         // Remove add button from previous row
         currentRows.scans.find(".addRow-button").remove();

         var html = '<tr class="scan_row"> \
                        <td> \
                           <input type="file" name="scan_'+ rowCounts.scans +'"/> \
                        </td> \
                        <td> \
                           <div class="addRow-button"></div> \
                        </td> \
                     </tr>';

         $row = $(html);
         currentRows.scans = $row;

         $rowCountObjs.scans.val(rowCounts.payees);
         break;
      }
   }

   $("#"+table).append($row);
}