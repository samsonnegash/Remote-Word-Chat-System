window.addEventListener('load', () => {
    const pc = new RTCPeerConnection({});
    const ws = new WebSocket('ws://127.0.0.1:1337');
    let userId = null;

    function callback(e) {
        pc.setLocalDescription(e);
        ws.send(JSON.stringify({ sdp: e.sdp, type: e.type, id: userId }));
    }

    document.getElementById('setId').addEventListener('click', () => {
        userId = document.getElementById('idInput').value;
        ws.send(JSON.stringify({ id: userId }));
    });

    document.getElementById('call').addEventListener('click', () => {
        navigator.mediaDevices.getUserMedia({ audio: false, video: true })
            .then(e => {
                pc.addStream(e); 
                document.getElementById('localVideo').srcObject = e;
                pc.createOffer({ offerToReceiveVideo: true }).then(callback);
            });
    });

    document.getElementById('answer').addEventListener('click', () => {
        navigator.mediaDevices.getUserMedia({ audio: false, video: true })
            .then(e => {
                pc.addStream(e); 
                document.getElementById('localVideo').srcObject = e;
                pc.createAnswer().then(callback);
            });
    });

    pc.onicecandidate = function (e) {
        if (e.candidate) ws.send(JSON.stringify({ candidate: e.candidate, id: userId }));
    }

    pc.ontrack = function (e) {
        document.getElementById('remoteVideo').srcObject = e.streams[0];
    }

    ws.onmessage = function (e) {
        const data = JSON.parse(e.data)[0];

        if (!data.candidate && data.sdp)
            pc.setRemoteDescription({ type: data.type, sdp: data.sdp });

        if (data.candidate)
            pc.addIceCandidate(data.candidate);
    }
});