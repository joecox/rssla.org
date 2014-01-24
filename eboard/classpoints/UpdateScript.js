<script>



function updatePoints(firstAddAmount, secondAddAmount, thirdAddAmount, fourthAddAmount){

$.ajax({
  type: "POST",
  url: "updateclasspointsREVISEDDONOTUSE.php",
  data: {	firstyears: firstAddAmount, 
  			secondyears: secondAddAmount,
  			thirdyears: thirdyears,
  			fourthyears: fourthAddAmount}
})
}
</script>
