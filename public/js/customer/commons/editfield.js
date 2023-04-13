function createEditFieldElement(approve, cancle, defaultValue = "") {
    let wrapper = document.createElement("div");
    wrapper.className = "edit-field-element";
    wrapper.style.position = "relative";
    wrapper.style.zIndex = 10000;
    let inputText = document.createElement("input");
    inputText.value = defaultValue;
    inputText.type = "text";
    inputText.style.width = "100%";
    inputText.style.paddingLeft = "5px";
    inputText.onkeyup = (e) => {
        if (e.key == "Enter") {
            approve(e.currentTarget.value, wrapper);
        }
    }

    let approveBtn = document.createElement("button");
    approveBtn.onclick = () => approve(inputText.value, wrapper);
    approveBtn.innerHTML = "<i class=\"fas fa-check\"></i>"
    approveBtn.style.border = "1px solid #777";
    approveBtn.style.marginRight = "5px";
    let cancleBtn = document.createElement("button");
    cancleBtn.onclick = () => cancle(wrapper);
    cancleBtn.innerHTML = "<i class=\"fas fa-times\"></i>"
    cancleBtn.style.border = "1px solid #777";


    let action = document.createElement("div");
    action.appendChild(approveBtn);
    action.appendChild(cancleBtn);
    action.style.position = "absolute";
    action.style.top = "100%";
    action.style.right = 0

    wrapper.appendChild(inputText);

    wrapper.appendChild(action);

    return wrapper;
}