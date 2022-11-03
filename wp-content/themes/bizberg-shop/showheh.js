console.log("thành côgndklfjdklfjkdlfjkld");
const showBtn = document.querySelector(".fa-angle-down");
const showmenud = document.getElementById("categories-menu-product-comestic");
if (showmenud == null) {
	showmenud.style.display = "none";
} else {
	showmenud.style.display = "none";
}

jQuery(document).on("click", ".fa-angle-down", function () {
	console.log("thành côgndklfjdklfjkdlfjkld");
	const showBtn = document.querySelector(".fa-angle-down");

	let menushow = document.getElementById("categories-menu-product-comestic");
	showBtn.addEventListener("click", () => {
		alert("kdjfdkfj ");
		menushow.style.display = "none";
	});
});
