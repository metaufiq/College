using UnityEngine;
using System.Collections;
using UnityEngine.UI;
public class satuKeDua : MonoBehaviour {
	GameObject satuKedua;
	checkLine satuKeduaScript;
	ButtonGame kameraScript;
	Text satuKeduaText;
	private string temp;
	// Use this for initialization
	void Start () {
		satuKedua = GameObject.Find ("Main Camera");
		kameraScript = satuKedua.GetComponent<ButtonGame> ();
		satuKeduaScript = satuKedua.GetComponent<checkLine> ();
		satuKeduaText = gameObject.GetComponent<Text> ();
		//satuKeduaText.text="ḧuhuahdashdhasda";
	}
	
	// Update is called once per frame
	void Update () {
		if ((satuKeduaScript.Graf [0, 1] != 0 || satuKeduaScript.Graf [0, 1] != 0) && kameraScript.menuButtonPlay!="give up?") {
			temp = "" + satuKeduaScript.Graf [0, 1];
			satuKeduaText.text = temp;
		} else satuKeduaText.text=" ";
	}
}
