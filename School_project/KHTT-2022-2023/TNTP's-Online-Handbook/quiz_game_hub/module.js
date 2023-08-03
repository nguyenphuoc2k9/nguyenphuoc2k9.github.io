import { initializeApp } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-analytics.js";
import { getAuth, onAuthStateChanged, signOut, deleteUser } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-auth.js";
import { getDatabase, set, ref, onValue, update } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-database.js";
import { getFirestore, setDoc, doc, collection } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-firestore.js";
import { getStorage, ref as storageref, getDownloadURL, uploadBytes } from "https://www.gstatic.com/firebasejs/9.21.0/firebase-storage.js";
//variable
const btn = document.getElementById('submit-btn')
const firebaseConfig = {
  apiKey: "AIzaSyDaLmLo0Z6BUd1wYpqTFgEks0liCL6kjlE",
  authDomain: "tntp-s-online-handb.firebaseapp.com",
  projectId: "tntp-s-online-handb",
  storageBucket: "tntp-s-online-handb.appspot.com",
  messagingSenderId: "699284847876",
  appId: "1:699284847876:web:5d340338d3b559f880a451",
  measurementId: "G-531EMCZKBV"
};

const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const database = getDatabase(app)
const storage = getStorage(app)
const auth = getAuth()
onAuthStateChanged(auth, (user) => {
  if (user) {

    // User is signed in, see docs for a list of available properties
    // https://firebase.google.com/docs/reference/js/firebase.User
    const uid = user.uid;
    console.log(uid);
    const starCountRef = ref(database, 'users/' + uid);
    onValue(starCountRef, (snapshot) => {
      const data = snapshot.val();
      print_user(data, uid)
      const health_condition = data.health_condition
      if (health_condition == undefined || health_condition == null) {
        deleteUser(user).then(() => {
          window.location.reload()
        }).catch((err)=>{
          console.log(err);
        })
      } else {
        console.log('user verified');
      }
    }, {
      onlyOnce: true
    });
    onValue(ref(database, 'session/'), (val) => {
      const data = val.val()
      print_session(data, uid)
    }, {
      onlyOnce: true,
    })
    start_feedback(uid)
    verify_user(user, uid)
  } else {
    window.location.replace('../login and sign up/index.html')
    // ...
  }
});

function print_user(data, uid) {
  console.log(uid);
  console.log(data);

  onValue(ref(database, 'session/'), (session) => {
    const session_data = session.val()
    const session_data_keys = Object.keys(session_data)
    let session_count = 0
    for (let i = 0; i < session_data_keys.length; i++) {
      var current_session = session_data[session_data_keys[i]]
      if (current_session.session_data != undefined) {
        if (current_session.session_data[`${uid}`] != undefined && current_session.session_data[`${uid}`] != null) {
          session_count += 1
        }
      }
    }
    document.getElementById('session-joined').innerText = `${session_count} Phiên hoạt động`
    document.getElementById('achievement').innerText = `${data.archive.length} thành tựu`
  })
  let photo;
  var str = new String(data.avatar)
  console.log(str.split(",")[0]);
  if (data.avatar.includes(',')) {
    getDownloadURL(storageref(storage, 'avatar/' + str.split(",")[0]))
      .then((url) => {
        // `url` is the download URL for 'images/stars.jpg'

        // This can be downloaded directly:
        // const xhr = new XMLHttpRequest();
        // xhr.responseType = 'blob';
        // xhr.onload = (event) => {
        //   const blob = xhr.response;
        // };
        // xhr.open('GET', url);
        // xhr.send();
        photo = url
        sidenav(photo)
        console.log(photo);
      })
  } else {
    if (data.avatar == "none" || data.avatar == null) {
      photo = '../user.png'

    } else {
      photo = data.avatar
    }
    sidenav(photo)
  }
  function sidenav(photo) {
    console.log(photo);
    document.getElementById('img').src = photo
    document.getElementById('href').href += `?id=${uid}&&profile=true`
    document.getElementById('welcome-title').innerText = `Chào ${data.username}`
  }

}

//sign-out
const sign_out_btn = document.getElementById("sign-out")
sign_out_btn.addEventListener("click", () => {
  signOut(auth).then(() => {
    // Sign-out successful.
  }).catch((error) => {
    console.log(error);
    // An error happened.
  });
})
btn.addEventListener('click', (e) => {
  e.preventDefault()
  var value_input = document.getElementById('search-value').value.toLowerCase()
  if (value_input == '' || value_input == 0) {
    alert('search input cannot be empty')
  } else {
    window.location.replace(`../search_result/index.html?search_value=${value_input}`)

  }
})