ClassicEditor.create(document.querySelector(".editor"),{toolbar:{items:["heading","|","bold","italic","link","bulletedList","numberedList","|","outdent","indent","|","imageUpload","blockQuote","insertTable","mediaEmbed","undo","redo"],rtl:"true"},language:"en",image:{toolbar:["imageTextAlternative","imageStyle:inline","imageStyle:block","imageStyle:side"]},table:{contentToolbar:["tableColumn","tableRow","mergeTableCells"]},licenseKey:""}).then((e=>{window.editor=e})).catch((e=>{}));