document.querySelectorAll("#delete").forEach((list) => {
    list.addEventListener("click", (e) => {
        
        let id = list.dataset.listid;

        console.log(id);

        let formData = new FormData();
        formData.append("id", id);

        fetch("ajax/deleteList.php", {
            method: "POST",
            body: formData,
          })
            .then((response) => response.json())
            .then((result) => {
              console.log("suces", result);
            })
            .catch((error) => {
              console.error("Error:", error);
            });
    });
});