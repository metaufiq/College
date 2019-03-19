using UnityEngine;
using System.Collections;
using UnityEngine.UI;
public class tujuhKesembilan : MonoBehaviour {
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
		if ((satuKeduaScript.Graf [6, 8] != 0 || satuKeduaScript.Graf [6, 8] != 0)&& kameraScript.menuButtonPlay!="give up?") {

			satuKeduaText.text =" " + satuKeduaScript.Graf [6, 8];
			Debug.Log ("masuk hehe");
		} else satuKeduaText.text = " ";
	}
}
