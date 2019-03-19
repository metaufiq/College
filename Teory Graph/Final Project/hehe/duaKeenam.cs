using UnityEngine;
using System.Collections;
using UnityEngine.UI;
public class duaKeenam : MonoBehaviour {
	GameObject satuKedua;
	checkLine satuKeduaScript;
	ButtonGame kameraScript;
	Text satuKeduaText;
	// Use this for initialization
	void Start () {
		satuKedua = GameObject.Find ("Main Camera");
		kameraScript = satuKedua.GetComponent<ButtonGame> ();
		satuKeduaScript = satuKedua.GetComponent<checkLine> ();
		satuKeduaText = gameObject.GetComponent<Text> ();
	}

	// Update is called once per frame
	void Update () {
		if ((satuKeduaScript.Graf [1, 5] != 0 || satuKeduaScript.Graf [1, 5] != 0)&& kameraScript.menuButtonPlay!="give up?") {

			satuKeduaText.text =" " + satuKeduaScript.Graf [1, 5];
			Debug.Log ("masuk hehe");
		} else {satuKeduaText.text =" ";
		}
	}
}
