/**
 * Created by MAGNUS on 2/29/2016.
 */

var loadFile = function(event){
    var output = document.getElementById('show_image');
    output.src = URL.createObjectURL(event.target.files[0]);
}