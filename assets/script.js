// Modal Elements
const modal = document.getElementById("messageModal");
const closeBtn = modal.querySelector(".close");
const chatBox = document.getElementById("chatBox");
const responseMsg = document.getElementById("responseMsg");

// Open Modal & Load Messages
document.querySelectorAll(".messageBtn").forEach(btn => {
    btn.addEventListener("click", () => {
        const resourceId = btn.dataset.id;
        document.getElementById("modalTitle").innerText = "Message " + btn.dataset.name;
        document.getElementById("resource_id").value = resourceId;
        modal.style.display = "block";
        loadMessages(resourceId); // load messages immediately
    });
});

// Close Modal
closeBtn.onclick = function() {
    modal.style.display = "none";
    chatBox.innerHTML = "";
    responseMsg.innerText = "";
}

window.onclick = function(event) {
    if(event.target == modal){
        modal.style.display = "none";
        chatBox.innerHTML = "";
        responseMsg.innerText = "";
    }
}

// Submit Message via AJAX
document.getElementById("messageForm").addEventListener("submit", function(e){
    e.preventDefault();
    let formData = new FormData(this);

    fetch("send_message.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(data => {
        this.reset();
        loadMessages(document.getElementById("resource_id").value); // reload messages
        responseMsg.style.color = "green";
        responseMsg.innerText = "Message sent successfully!";
    })
    .catch(err => {
        responseMsg.style.color = "red";
        responseMsg.innerText = "Error sending message!";
    });
});

// Function to Load Messages
function loadMessages(resourceId) {
    fetch("get_messages.php?resource_id=" + resourceId)
    .then(res => res.json())
    .then(data => {
        chatBox.innerHTML = "";
        data.forEach(msg => {
            const div = document.createElement("div");
            div.style.padding = "8px";
            div.style.marginBottom = "6px";
            div.style.background = "#e0f7fa";
            div.style.borderRadius = "8px";
            div.innerHTML = "<b>"+msg.sender_name+":</b> "+msg.message;
            chatBox.appendChild(div);
        });
        chatBox.scrollTop = chatBox.scrollHeight; // scroll to bottom
    });
}
