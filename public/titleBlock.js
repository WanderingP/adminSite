var titleBlock = {
    list : function () {
    // list() : show all 

      adm.load({
        url : "ajax-titleBlock.php",
        target : "container",
        data : {
          req : "list"
        }
      });
    },

    search : function(){
      adm.load({
        url : "ajax-titleBlock.php",
        target : "container",
        data : {
          req : "search",
          document_description : document.getElementById("search").value
        },
        ok : titleBlock.list
      });
      return false;
    },
    
  
    addEdit : function (id) {
    // addEdit()
    // PARAM id 
      adm.load({
        url : "ajax-titleBlock.php",
        target : "container",
        data : {
          req : "addEdit",
          id : id
        }
      });
    },
  
    save : function () {
    // save() 
      var id = document.getElementById("id").value;
      adm.ajax({
        url : "ajax-titleBlock.php",
        data : {
          req : (id=="" ? "add" : "edit"),
          id : id,
          handle : document.getElementById("handle").value,
          blockname : document.getElementById("blockname").value,
          project : document.getElementById("project").value,
          document_description : document.getElementById("document_description").value,
          project_id : document.getElementById("project_id").value,
          revision : document.getElementById("revision").value,
          scale : document.getElementById("scale").value,
          document_num : document.getElementById("document_num").value,
          drawn_by : document.getElementById("drawn_by").value,
          approved_by : document.getElementById("approved_by").value,
          checked_by : document.getElementById("checked_by").value,
          issued_by : document.getElementById("issued_by").value,
          drawn_date : document.getElementById("drawn_date").value,
          approved_date : document.getElementById("approved_date").value,
          checked_date : document.getElementById("checked_date").value,
          issued_date : document.getElementById("issued_date").value,
          purpose : document.getElementById("purpose").value,
          notes : document.getElementById("notes").value
        },
        ok 
      });
      return false;
    },

    update : function () {
      // update() 
        var id = document.getElementById("id").value;
        adm.ajax({
          url : "ajax-titleBlock.php",
          data : {
            req : "update",
            id : id,
            handle : document.getElementById("handle").value,
            blockname : document.getElementById("blockname").value,
            project : document.getElementById("project").value,
            document_description : document.getElementById("document_description").value,
            project_id : document.getElementById("project_id").value,
            revision : document.getElementById("revision").value,
            scale : document.getElementById("scale").value,
            document_num : document.getElementById("document_num").value,
            drawn_by : document.getElementById("drawn_by").value,
            approved_by : document.getElementById("approved_by").value,
            checked_by : document.getElementById("checked_by").value,
            issued_by : document.getElementById("issued_by").value,
            drawn_date : document.getElementById("drawn_date").value,
            approved_date : document.getElementById("approved_date").value,
            checked_date : document.getElementById("checked_date").value,
            issued_date : document.getElementById("issued_date").value,
            purpose : document.getElementById("purpose").value,
            notes : document.getElementById("notes").value,
           
          },
          ok : titleBlock.list
        });
        return false;
      },

  
    del : function (id) {
    // del() : delete
    // PARAM id 
      if (confirm("Delete?")) {
        adm.ajax({
          url : "ajax-titleBlock.php",
          data : {
            req : "del",
            id : id
          },
          ok : titleBlock.list
        });
      }
    }
  };
  

  window.addEventListener("load", titleBlock.list);