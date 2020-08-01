<script src="data.js" type="text/javascript"></script>

<script>

obj = {category:'bal'};
// obj = {category:'bal', regions:["chest", "shoulders"]};
// obj = {category:'bpp',video:{"en": "se_bpp_007_en.mp4", "nl": "se_bpp_007_nl.mp4", "de": "se_bpp_007_de.mp4"}};
// obj = {category:'bpp',regions: ["thighs", "calves"]}
customFilter(data, obj);
function customFilter(dataArray, filteringObject){

    for (let index in dataArray) {
        dataArray2 = dataArray[index];

        var matchigCount = 0, searchingObjLength=0;

        for (let key in filteringObject) {
            searchingObjLength++
            if(JSON.stringify(dataArray2[key])==JSON.stringify(filteringObject[key]))
            {
                matchigCount++
            }
        }

        if(searchingObjLength == matchigCount)
          console.log(dataArray2)

    }
}
</script>