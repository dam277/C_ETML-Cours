package crc64597298b5a7bb7f4f;


public class SecondActivity
	extends androidx.appcompat.app.AppCompatActivity
	implements
		mono.android.IGCUserPeer
{
/** @hide */
	public static final String __md_methods;
	static {
		__md_methods = 
			"";
		mono.android.Runtime.register ("ApplicationMobile_Android.SecondActivity, ApplicationMobile-Android", SecondActivity.class, __md_methods);
	}


	public SecondActivity ()
	{
		super ();
		if (getClass () == SecondActivity.class)
			mono.android.TypeManager.Activate ("ApplicationMobile_Android.SecondActivity, ApplicationMobile-Android", "", this, new java.lang.Object[] {  });
	}


	public SecondActivity (int p0)
	{
		super (p0);
		if (getClass () == SecondActivity.class)
			mono.android.TypeManager.Activate ("ApplicationMobile_Android.SecondActivity, ApplicationMobile-Android", "System.Int32, mscorlib", this, new java.lang.Object[] { p0 });
	}

	private java.util.ArrayList refList;
	public void monodroidAddReference (java.lang.Object obj)
	{
		if (refList == null)
			refList = new java.util.ArrayList ();
		refList.add (obj);
	}

	public void monodroidClearReferences ()
	{
		if (refList != null)
			refList.clear ();
	}
}
