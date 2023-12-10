import requestFunctions from "./Functions.js";

var links = document
  .getElementById("accordionSidebar")
  .getElementsByClassName("collapse-item");

Array.from(links).forEach((link) => {
  link.addEventListener("click", async (e) => {
    e.preventDefault();
    const dataContent = document.querySelector("[data-content]");
    dataContent.innerHTML = "";
    const data = await requestFunctions.renderView(link.dataset.view);

    if (Array.isArray(data)) {
      const table = document.createElement("table");
      table.id = "users";
      table.classList.add('table','table-bordered')
      const thead = document.createElement("thead");
      const tbody = document.createElement("tbody");

      const tableRow = document.createElement("tr");

      Object.keys(data[0]).forEach((key) => {
        const th = document.createElement("th");
        th.textContent = key;
        tableRow.appendChild(th);
      });

      thead.appendChild(tableRow);
      table.appendChild(thead);

      data.forEach((item) => {
        const tr = document.createElement("tr");
        Object.values(item).forEach((value) => {
          const td = document.createElement("td");
          td.textContent = value;
          tr.appendChild(td);
        });
        tbody.appendChild(tr);
        // console.log(item);
      });

      table.appendChild(tbody);

      dataContent.appendChild(table);
    }
  });
});
