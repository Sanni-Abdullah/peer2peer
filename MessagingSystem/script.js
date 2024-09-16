const messageInput = document.getElementById('message-input');
const sendButton = document.getElementById('send-button');
const messagesDiv = document.getElementById('messages');
const startCallButton = document.getElementById('start-call');

let localStream;
let peerConnection;

sendButton.addEventListener('click', () => {
    const message = messageInput.value;
    if (message.trim()) {
        sendMessage(message);
    }
});

function sendMessage(message) {
    const messageDiv = document.createElement('div');
    messageDiv.textContent = message;
    messagesDiv.appendChild(messageDiv);
    messageInput.value = '';
}

// WebRTC Setup for Video Calls
startCallButton.addEventListener('click', startCall);

async function startCall() {
    localStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
    document.getElementById('localVideo').srcObject = localStream;

    // WebRTC Signaling and PeerConnection setup would go here
    async function startCall() {
        try {
            const localStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
            document.getElementById('localVideo').srcObject = localStream;
    
            // Prepare the peer connection
            initializePeerConnection(localStream);
        } catch (error) {
            console.error('Error accessing media devices.', error);
        }
    }

    let peerConnection;
const configuration = {
    iceServers: [{ urls: 'stun:stun.l.google.com:19302' }] // STUN server for NAT traversal
};

function initializePeerConnection(localStream) {
    peerConnection = new RTCPeerConnection(configuration);

    // Add local stream to peer connection
    localStream.getTracks().forEach(track => peerConnection.addTrack(track, localStream));

    // Listen for remote stream
    peerConnection.ontrack = event => {
        document.getElementById('remoteVideo').srcObject = event.streams[0];
    };

    // Gather ICE candidates
    peerConnection.onicecandidate = event => {
        if (event.candidate) {
            sendToServer('candidate', event.candidate);
        }
    };

    // Create an offer
    createOffer();
}

}

// Signaling via WebSocket or WebRTC signaling server will be handled in the backend
