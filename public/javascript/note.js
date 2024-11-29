document.addEventListener("DOMContentLoaded", () => {
    const content = document.querySelector(".content");
    const btnNew = document.querySelector(".addNote-content");
  
    const colors = ["#845EC2", "#008F7A", "#008E9B", "#FFC75F", "#FF8066", "#BA3CAF"];
    const randomColor = () => colors[Math.floor(Math.random() * colors.length)];
  
    fetch("index.php?action=getNotes")
  .then((response) => {
    if (!response.ok) {
      throw new Error("Erro na requisição: " + response.status);
    }
    return response.json();
  })
  .then((items) => {
    console.log(items); // Depure o resultado
    content.innerHTML = "";
    items.forEach((item) => addHTML(item));
  })
  .catch((error) => {
    console.error("Erro:", error);
  });

    
  
    btnNew.onclick = () => {
      const color = randomColor();
      fetch("index.php?action=saveNote", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ text: "", color }),
      }).then(loadItems);
    };
  
    loadItems();
  });
  