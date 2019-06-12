$(function(){
    MTS = {
        pagination : function (page, count, total) {
            var pages = Math.ceil( total / count);
            html = '';
            if(pages == 1) {
                html += '<a class="item disabled" data-value="1">1</a>';
            }else if(pages < 10) {
                for (var i = 1; i <= pages; i++) {
                    if(i == page) {
                        html += '<a class="item disabled" data-value="'+i+'">'+i+'</a>';
                    }else {
                        html += '<a class="item p-active"  data-value="'+i+'">'+i+'</a>';
                    }
                }
            }else if(page == 1) {
                html += '<a class="item disabled" data-value="1">1</a>';
                html += '<a class="item p-active"  data-value="'+(parseInt(page) + 1)+'">'+(parseInt(page) + 1)+'</a>';
                html += '<a class="item disabled" data-value="-1">……</a>';
                html += '<a class="item p-active"  data-value="'+pages+'">'+pages+'</a>';
            }else if(page == pages) {
                html += '<a class="item p-active"  data-value="1">1</a>';
                html += '<a class="item disabled" data-value="-1">……</a>';
                html += '<a class="item p-active"  data-value="'+(parseInt(page) - 1)+'">'+(parseInt(page) - 1)+'</a>';
                html += '<a class="item disabled" data-value="'+pages+'">'+pages+'</a>';
            }else {
                html += '<a class="item p-active"  data-value="1">1</a>';
                html += '<a class="item disabled" data-value="-1">……</a>';
                html += '<a class="item p-active"  data-value="'+(parseInt(page) - 1)+'">'+(parseInt(page) - 1)+'</a>';
                html += '<a class="item disabled" data-value="'+page+'">'+page+'</a>';
                html += '<a class="item p-active"  data-value="'+(parseInt(page) + 1)+'">'+(parseInt(page) + 1)+'</a>';
                html += '<a class="item disabled" data-value="-1">……</a>';
                html += '<a class="item p-active"  data-value="'+pages+'">'+pages+'</a>';
            }
            html += '<a class="item disabled">Total:'+total+'</a>';
            return html;
        }
    }
})